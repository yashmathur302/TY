<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'cover_image',
        'category', 'likes_count', 'comments_count', 'views_count', 'published_at',
    ];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coverUrl(): ?string
    {
        return $this->cover_image ? asset($this->cover_image) : null;
    }
}
