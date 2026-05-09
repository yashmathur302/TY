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
}
