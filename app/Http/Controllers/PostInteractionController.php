<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Share;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Event;
use App\Models\Page;
use Illuminate\Http\Request;

class PostInteractionController extends Controller
{
    // ── Toggle Like ──────────────────────────────────────────
    public function toggleLike(Post $post)
    {
        $userId   = auth()->id();
        $existing = Like::where('user_id', $userId)->where('post_id', $post->id)->first();

        if ($existing) {
            $existing->delete();
            // guard against unsigned underflow
            if ($post->likes_count > 0) {
                $post->decrement('likes_count');
            }
            $liked = false;
        } else {
            Like::create(['user_id' => $userId, 'post_id' => $post->id]);
            $post->increment('likes_count');
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => (int) $post->fresh()->likes_count,
        ]);
    }

    // ── Share Post (with destination + caption) ───────────────
    public function share(Post $post, Request $request)
    {
        $request->validate([
            'destination_type' => ['required', 'in:profile,group,event,page'],
            'destination_id'   => ['nullable', 'integer', 'min:1'],
            'caption'          => ['nullable', 'string', 'max:2000'],
        ]);

        Share::create([
            'user_id'          => auth()->id(),
            'post_id'          => $post->id,
            'destination_type' => $request->destination_type,
            'destination_id'   => $request->destination_id ?: null,
            'caption'          => $request->caption ?: null,
        ]);

        $post->increment('shares_count');

        return response()->json([
            'success' => true,
            'count'   => (int) $post->fresh()->shares_count,
        ]);
    }

    // ── Share destination lists ────────────────────────────────

    public function shareGroups()
    {
        $user    = auth()->user();
        $joined  = $user->joinedGroups()->get(['groups.id', 'groups.name', 'groups.cover_photo']);
        $created = Group::where('created_by', $user->id)->get(['id', 'name', 'cover_photo']);
        $all     = $joined->merge($created)->unique('id');

        return response()->json($all->map(fn($g) => [
            'id'    => $g->id,
            'name'  => $g->name,
            'cover' => $g->cover_photo ? asset($g->cover_photo) : null,
        ])->values());
    }

    public function shareEvents()
    {
        $user      = auth()->user();
        $attending = $user->attendingEvents()->get(['events.id', 'events.title', 'events.cover_photo']);
        $created   = Event::where('created_by', $user->id)->get(['id', 'title', 'cover_photo']);
        $all       = $attending->merge($created)->unique('id');

        return response()->json($all->map(fn($e) => [
            'id'    => $e->id,
            'name'  => $e->title,
            'cover' => $e->cover_photo ? asset($e->cover_photo) : null,
        ])->values());
    }

    public function sharePages()
    {
        $user    = auth()->user();
        $liked   = Page::whereHas('followers', fn($q) => $q->where('user_id', $user->id))
                       ->get(['id', 'name', 'cover_photo']);
        $created = Page::where('created_by', $user->id)->get(['id', 'name', 'cover_photo']);
        $all     = $liked->merge($created)->unique('id');

        return response()->json($all->map(fn($p) => [
            'id'    => $p->id,
            'name'  => $p->name,
            'cover' => $p->cover_photo ? asset($p->cover_photo) : null,
        ])->values());
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
