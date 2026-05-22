<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    public $timestamps = false;

    protected $fillable = ['event_id', 'user_id', 'status'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;
}
