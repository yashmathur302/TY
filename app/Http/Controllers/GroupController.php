<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Controllers\Concerns\HandlesFileUpload;

class GroupController extends Controller
{
    use HandlesFileUpload;

    public function show(Group $group)
    {
        return view('group-detail', compact('group'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'privacy'     => ['required', 'in:public,private'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'privacy'     => $request->privacy,
            'created_by'  => auth()->id(),
        ];

        if ($request->hasFile('cover')) {
            $data['cover_photo'] = $this->storeUpload($request->file('cover'), 'group-covers');
        }

        $group = Group::create($data);

        return redirect()->route('groups.show', $group)
            ->with('success', 'Group created successfully!');
    }
}
