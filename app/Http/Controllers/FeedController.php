<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Page;

class FeedController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with([
            'user',
            'comments' => fn($q) => $q->with(['user', 'replies.user'])->oldest()->limit(5),
        ])->latest()->paginate(15);

        // Mark which posts current user has liked / shared
        $uid        = auth()->id();
        $likedIds   = \App\Models\Like::where('user_id', $uid)->pluck('post_id')->toArray();
        $sharedIds  = \App\Models\Share::where('user_id', $uid)->pluck('post_id')->toArray();
        $posts->each(function ($p) use ($likedIds, $sharedIds) {
            $p->is_liked  = in_array($p->id, $likedIds);
            $p->is_shared = in_array($p->id, $sharedIds);
        });

        return view('feed', compact('posts'));
    }

    public function messages()
    {
        return view('messages');
    }

    public function events()
    {
        $myEvents = Event::where('created_by', auth()->id())->latest()->get();
        return view('events', compact('myEvents'));
    }

    public function eventDetail()
    {
        return view('event-detail');
    }

    public function pages()
    {
        $myPages = Page::where('created_by', auth()->id())->latest()->get();
        return view('pages', compact('myPages'));
    }

    public function pageDetail()
    {
        return view('page-detail');
    }

    public function groups()
    {
        $myGroups = Group::where('created_by', auth()->id())->latest()->get();
        return view('groups', compact('myGroups'));
    }

    public function groupDetail()
    {
        return view('group-detail');
    }

    public function blog()
    {
        $myBlogs = BlogPost::where('user_id', auth()->id())->latest()->get();
        return view('blog', compact('myBlogs'));
    }

    public function blogRead()
    {
        return view('blog-read');
    }

    public function profile()
    {
        $user = auth()->user();

        $posts  = $user->posts()
            ->with(['comments' => fn($q) => $q->with(['user', 'replies.user'])->oldest()->limit(5)])
            ->latest()->get();

        $uid        = auth()->id();
        $likedIds   = \App\Models\Like::where('user_id', $uid)->pluck('post_id')->toArray();
        $sharedIds  = \App\Models\Share::where('user_id', $uid)->pluck('post_id')->toArray();
        $posts->each(function ($p) use ($likedIds, $sharedIds) {
            $p->is_liked  = in_array($p->id, $likedIds);
            $p->is_shared = in_array($p->id, $sharedIds);
        });

        $photos  = $user->posts()->whereNotNull('image')->latest()->get();
        $videos  = $user->posts()->whereNotNull('video')->latest()->get();
        $albums  = $user->albums()->with(['photos' => fn($q) => $q->limit(4)])->get();

        $myGroups     = Group::where('created_by', $user->id)->latest()->get();
        $joinedGroups = $user->joinedGroups()
            ->where('created_by', '!=', $user->id)->latest()->get();

        $myEvents     = Event::where('created_by', $user->id)->latest()->get();
        $otherEvents  = $user->attendingEvents()
            ->where('created_by', '!=', $user->id)->latest()->get();

        $myBlogs      = BlogPost::where('user_id', $user->id)->latest()->get();

        $myPages      = Page::where('created_by', $user->id)->latest()->get();

        $followers    = $user->followers()->latest()->limit(12)->get();
        $following    = $user->following()->latest()->limit(12)->get();

        return view('profile', compact(
            'user', 'posts', 'photos', 'videos', 'albums',
            'myGroups', 'joinedGroups',
            'myEvents', 'otherEvents',
            'myBlogs', 'myPages', 'followers', 'following'
        ));
    }

    public function settings()
    {
        return view('settings');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
