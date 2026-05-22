<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Controllers\Concerns\HandlesFileUpload;

class BlogController extends Controller
{
    use HandlesFileUpload;

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'content'     => ['required', 'string'],
            'category'    => ['nullable', 'string', 'max:100'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $data = [
            'user_id'      => auth()->id(),
            'title'        => $request->title,
            'content'      => $request->content,
            'category'     => $request->category,
            'published_at' => now(),
        ];

        if ($request->hasFile('cover')) {
            $data['cover_image'] = $this->storeUpload($request->file('cover'), 'blog-covers');
        }

        BlogPost::create($data);

        return redirect()->route('profile')
            ->with('success', 'Blog post published!')
            ->with('profile_tab', 6);
    }
}
