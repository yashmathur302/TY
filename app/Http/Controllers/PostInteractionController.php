<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Share;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostInteractionController extends Controller
{
    // ── Toggle Like ──────────────────────────────────────────
    public function toggleLike(Post $post)
    {
        $userId = auth()->id();
        $existing = Like::where('user_id', $userId)->where('post_id', $post->id)->first();

        if ($existing) {
            $existing->delete();
            $post->decrement('likes_count');
            $liked = false;
        } else {
            Like::create(['user_id' => $userId, 'post_id' => $post->id]);
            $post->increment('likes_count');
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => $post->fresh()->likes_count,
        ]);
    }

    // ── Toggle Share ─────────────────────────────────────────
    public function toggleShare(Post $post)
    {
        $userId = auth()->id();
        $existing = Share::where('user_id', $userId)->where('post_id', $post->id)->first();

        if ($existing) {
            $existing->delete();
            $post->decrement('shares_count');
            $shared = false;
        } else {
            Share::create(['user_id' => $userId, 'post_id' => $post->id]);
            $post->increment('shares_count');
            $shared = true;
        }

        return response()->json([
            'shared' => $shared,
            'count'  => $post->fresh()->shares_count,
        ]);
    }

    // ── Store Comment ─────────────────────────────────────────
    public function storeComment(Post $post, Request $request)
    {
        $request->validate(['content' => ['required', 'string', 'max:1000']]);

        Comment::create([
            'post_id'   => $post->id,
            'user_id'   => auth()->id(),
            'parent_id' => null,
            'content'   => $request->content,
        ]);

        $post->increment('comments_count');

        return redirect()->back()->with('profile_tab', 0);
    }

    // ── Store Reply ───────────────────────────────────────────
    public function storeReply(Post $post, Comment $comment, Request $request)
    {
        $request->validate(['content' => ['required', 'string', 'max:1000']]);

        Comment::create([
            'post_id'   => $post->id,
            'user_id'   => auth()->id(),
            'parent_id' => $comment->id,
            'content'   => $request->content,
        ]);

        $post->increment('comments_count');

        return redirect()->back()->with('profile_tab', 0);
    }

    // ── Likers list (JSON) ────────────────────────────────────
    public function likers(Post $post)
    {
        $users = $post->likes()->with('user')->latest()->get()->map(fn($l) => [
            'name'     => $l->user->name,
            'username' => $l->user->username ?? '',
            'avatar'   => $l->user->avatarUrl(),
        ]);

        return response()->json(['users' => $users]);
    }

    // ── Sharers list (JSON) ───────────────────────────────────
    public function sharers(Post $post)
    {
        $users = $post->shares()->with('user')->latest()->get()->map(fn($s) => [
            'name'     => $s->user->name,
            'username' => $s->user->username ?? '',
            'avatar'   => $s->user->avatarUrl(),
        ]);

        return response()->json(['users' => $users]);
    }
}
