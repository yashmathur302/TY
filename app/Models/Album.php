<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['user_id', 'name', 'cover_photo', 'photos_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(AlbumPhoto::class)->latest();
    }

    public function coverUrl(): ?string
    {
        return $this->cover_photo ? asset($this->cover_photo) : null;
    }
}
