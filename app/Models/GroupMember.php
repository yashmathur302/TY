<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    public $timestamps = false;

    protected $fillable = ['group_id', 'user_id', 'role'];

    const CREATED_AT = 'joined_at';
    const UPDATED_AT = null;
}
