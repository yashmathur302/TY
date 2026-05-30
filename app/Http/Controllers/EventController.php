<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Concerns\HandlesFileUpload;

class EventController extends Controller
{
    use HandlesFileUpload;

    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'location'    => ['nullable', 'string', 'max:255'],
            'start_date'  => ['required', 'date'],
            'end_date'    => ['nullable', 'date', 'after_or_equal:start_date'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'created_by'  => auth()->id(),
        ];

        if ($request->hasFile('cover')) {
            $data['cover_photo'] = $this->storeUpload($request->file('cover'), 'event-covers');
        }

        $event = Event::create($data);

        return redirect()->route('events.show', $event)
            ->with('success', 'Event created successfully!');
    }
}
