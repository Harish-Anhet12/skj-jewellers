<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $fillable = [
        'name',
        'can_dashboard',
        'can_department',
        'can_user',
        'can_role',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}