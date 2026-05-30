<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Concerns\HandlesFileUpload;

class PageController extends Controller
{
    use HandlesFileUpload;

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'category'    => ['nullable', 'string', 'max:100'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'category'    => $request->category,
            'created_by'  => auth()->id(),
        ];

        if ($request->hasFile('cover')) {
            $data['cover_photo'] = $this->storeUpload($request->file('cover'), 'page-covers');
        }

        Page::create($data);

        return redirect()->route('profile')
            ->with('success', 'Page created successfully!')
            ->with('profile_tab', 3);
    }
}
