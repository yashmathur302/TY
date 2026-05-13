<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'                => ['required', 'string', 'max:255'],
            'username'            => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'email'               => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'bio'                 => ['nullable', 'string', 'max:1000'],
            'gender'              => ['nullable', 'in:male,female,other'],
            'relationship_status' => ['nullable', 'in:single,relationship,married,engaged'],
        ]);

        $user->update($request->only(['name', 'username', 'email', 'bio', 'gender', 'relationship_status']));

        return back()->with('success', 'Profile updated successfully.')->with('active_tab', 0);
    }

    public function updateSocial(Request $request)
    {
        $request->validate([
            'facebook_url'  => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'twitter_url'   => ['nullable', 'url', 'max:255'],
            'youtube_url'   => ['nullable', 'url', 'max:255'],
            'github_url'    => ['nullable', 'url', 'max:255'],
        ]);

        Auth::user()->update($request->only(['facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'github_url']));

        return back()->with('success', 'Social links updated successfully.')->with('active_tab', 1);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()
                ->withErrors(['current_password' => 'Current password is incorrect.'])
                ->withInput()
                ->with('active_tab', 6);
        }

        Auth::user()->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password updated successfully.')->with('active_tab', 6);
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $user = Auth::user();

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $path = $request->file('avatar')->store('profile-photos', 'public');
        $user->update(['profile_photo' => $path]);

        return back()->with('success', 'Profile photo updated.')->with('active_tab', 0);
    }
}
