<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password',
        'bio', 'gender', 'relationship_status',
        'profile_photo', 'cover_photo',
        'location', 'work', 'education', 'website',
        'facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'github_url',
        'followers_count', 'following_count', 'posts_count', 'role',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function avatarUrl(): string
    {
        return $this->profile_photo
            ? asset($this->profile_photo)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=0ea5e9&color=fff&size=200';
    }

    public function coverUrl(): ?string
    {
        return $this->cover_photo ? asset($this->cover_photo) : null;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'last_seen_at'      => 'datetime',
        ];
    }
}
