<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumPhoto;
use App\Http\Controllers\Concerns\HandlesFileUpload;

class AlbumController extends Controller
{
    use HandlesFileUpload;

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Album::create([
            'user_id' => auth()->id(),
            'name'    => $request->name,
        ]);

        return redirect()->route('profile')
            ->with('success', 'Album created!')
            ->with('profile_tab', 2);
    }

    public function uploadPhoto(Request $request, Album $album)
    {
        $this->authorize_album($album);

        $request->validate([
            'photos'   => ['required', 'array', 'min:1'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
        ]);

        foreach ($request->file('photos') as $file) {
            $path = $this->storeUpload($file, 'albums/' . $album->id);

            $photo = AlbumPhoto::create([
                'album_id'   => $album->id,
                'user_id'    => auth()->id(),
                'image_path' => $path,
            ]);

            // Set first photo as album cover
            if (!$album->cover_photo) {
                $album->update(['cover_photo' => $path]);
            }
        }

        $album->increment('photos_count', count($request->file('photos')));

        return redirect()->route('profile')
            ->with('success', 'Photos uploaded!')
            ->with('profile_tab', 2);
    }

    public function rename(Request $request, Album $album)
    {
        $this->authorize_album($album);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $album->update(['name' => $request->name]);

        return redirect()->route('profile')
            ->with('success', 'Album renamed!')
            ->with('profile_tab', 2);
    }

    public function destroy(Album $album)
    {
        $this->authorize_album($album);

        foreach ($album->photos as $photo) {
            $this->deleteUpload($photo->image_path);
        }
        $this->deleteUpload($album->cover_photo);
        $album->delete();

        return redirect()->route('profile')
            ->with('success', 'Album deleted.')
            ->with('profile_tab', 2);
    }

    private function authorize_album(Album $album): void
    {
        abort_unless($album->user_id === auth()->id(), 403);
    }
}
