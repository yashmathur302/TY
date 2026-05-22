<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        return view('feed');
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
        $user  = auth()->user();
        $posts = $user->posts()
            ->with(['comments' => fn($q) => $q->with('user')->latest()->limit(2)])
            ->latest()
            ->get();

        return view('profile', compact('user', 'posts'));
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
