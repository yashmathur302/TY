<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\HandlesFileUpload;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use HandlesFileUpload;

    public function store(Request $request)
    {
        $request->validate([
            'content'  => ['nullable', 'string', 'max:5000'],
            'image'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:10240'],
            'video'    => ['nullable', 'mimes:mp4,mov,avi,webm', 'max:51200'],
            'feeling'  => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'privacy'  => ['nullable', 'in:public,friends,private'],
        ]);

        if (!$request->filled('content') && !$request->hasFile('image') && !$request->hasFile('video')) {
            return back()->withErrors(['content' => 'Please add some content, image, or video.'])->withInput();
        }

        $data = [
            'user_id'  => auth()->id(),
            'content'  => $request->content,
            'feeling'  => $request->feeling ?: null,
            'location' => $request->location ?: null,
            'privacy'  => $request->privacy ?? 'public',
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeUpload($request->file('image'), 'post-images');
        }
        if ($request->hasFile('video')) {
            $data['video'] = $this->storeUpload($request->file('video'), 'post-videos');
        }

        Post::create($data);
        auth()->user()->increment('posts_count');

        if ($request->input('redirect_to') === 'profile') {
            return redirect()->route('profile')->with('success', 'Post created!');
        }
        return redirect()->route('feed')->with('success', 'Post created!');
    }
}
