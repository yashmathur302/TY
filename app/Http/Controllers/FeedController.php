<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Event;
use App\Models\BlogPost;

class FeedController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with([
            'user',
            'comments' => fn($q) => $q->with('user')->latest()->limit(2),
        ])->latest()->paginate(15);

        return view('feed', compact('posts'));
    }

    public function messages()
    {
        return view('messages');
    }

    public function events()
    {
        return view('events');
    }

    public function eventDetail()
    {
        return view('event-detail');
    }

    public function pages()
    {
        return view('pages');
    }

    public function pageDetail()
    {
        return view('page-detail');
    }

    public function groups()
    {
        return view('groups');
    }

    public function groupDetail()
    {
        return view('group-detail');
    }

    public function blog()
    {
        return view('blog');
    }

    public function blogRead()
    {
        return view('blog-read');
    }

    public function profile()
    {
        $user = auth()->user();

        $posts  = $user->posts()
            ->with(['comments' => fn($q) => $q->with('user')->latest()->limit(2)])
            ->latest()->get();

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

        $followers    = $user->followers()->latest()->limit(12)->get();
        $following    = $user->following()->latest()->limit(12)->get();

        return view('profile', compact(
            'user', 'posts', 'photos', 'videos', 'albums',
            'myGroups', 'joinedGroups',
            'myEvents', 'otherEvents',
            'myBlogs', 'followers', 'following'
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
