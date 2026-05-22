<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'location'            => ['nullable', 'string', 'max:255'],
            'work'                => ['nullable', 'string', 'max:255'],
            'education'           => ['nullable', 'string', 'max:255'],
            'website'             => ['nullable', 'url', 'max:255'],
            'gender'              => ['nullable', 'in:male,female,other'],
            'relationship_status' => ['nullable', 'in:none,single,in_relationship,married,engaged'],
        ]);

        $user->update($request->only([
            'name', 'username', 'email', 'bio',
            'location', 'work', 'education', 'website',
            'gender', 'relationship_status',
        ]));

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

        // Delete old photo if stored in public/uploads
        if ($user->profile_photo && str_starts_with($user->profile_photo, 'uploads/')) {
            $oldPath = public_path($user->profile_photo);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Store directly in public/uploads/profile-photos/ — no symlink needed on cPanel
        $uploadDir = public_path('uploads/profile-photos');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $file     = $request->file('avatar');
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
        $file->move($uploadDir, $filename);

        $user->update(['profile_photo' => 'uploads/profile-photos/' . $filename]);

        return back()->with('success', 'Profile photo updated.')->with('active_tab', 0);
    }
}
