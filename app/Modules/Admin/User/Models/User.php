<?php

namespace App\Modules\Admin\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthUser
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'status'
    ];

    protected $hidden = [
        'password',
        'deleted_at'
    ];
}
