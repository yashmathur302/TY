<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function index()
    {
        $myId = auth()->id();

        // Pending requests sent TO me
        $requests = FriendRequest::where('receiver_id', $myId)
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        // IDs of all users I already have any relationship with
        $relatedIds = FriendRequest::where('sender_id', $myId)
            ->orWhere('receiver_id', $myId)
            ->get()
            ->flatMap(fn($r) => [$r->sender_id, $r->receiver_id])
            ->push($myId)
            ->unique()
            ->values()
            ->toArray();

        // People you may know
        $suggestions = User::whereNotIn('id', $relatedIds)
            ->inRandomOrder()
            ->limit(24)
            ->get();

        return view('friends', compact('requests', 'suggestions'));
    }

    public function sendRequest(User $user)
    {
        $myId = auth()->id();
        if ($user->id === $myId) return back();

        FriendRequest::firstOrCreate(
            ['sender_id' => $myId, 'receiver_id' => $user->id],
            ['status' => 'pending']
        );

        return back()->with('success', 'Friend request sent!');
    }

    public function accept(FriendRequest $friendRequest)
    {
        abort_if($friendRequest->receiver_id !== auth()->id(), 403);
        $friendRequest->update(['status' => 'accepted']);
        return back()->with('success', 'Friend request accepted!');
    }

    public function decline(FriendRequest $friendRequest)
    {
        abort_if($friendRequest->receiver_id !== auth()->id(), 403);
        $friendRequest->update(['status' => 'declined']);
        return back();
    }
}
