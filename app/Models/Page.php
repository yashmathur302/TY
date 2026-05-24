<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'description', 'cover_photo', 'category', 'followers_count', 'created_by'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'page_followers', 'page_id', 'user_id');
    }

    public function coverUrl(): ?string
    {
        return $this->cover_photo ? asset($this->cover_photo) : null;
    }
}
