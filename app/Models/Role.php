<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $fillable = [
        'name',
        'can_create',
        'can_read',
        'can_update',
        'can_delete',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}