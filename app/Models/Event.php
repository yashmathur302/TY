<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'cover_photo', 'location',
        'start_date', 'end_date', 'created_by', 'going_count', 'interested_count',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date'   => 'datetime',
        ];
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function attendees()
    {
        return $this->hasMany(EventAttendee::class);
    }

    public function coverUrl(): ?string
    {
        return $this->cover_photo ? asset($this->cover_photo) : null;
    }
}
