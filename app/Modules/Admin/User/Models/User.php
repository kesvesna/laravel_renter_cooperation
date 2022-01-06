<?php

namespace App\Modules\Admin\User\Models;

use App\Modules\Admin\Role\Models\Traits\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthUser
{
    use HasFactory, HasApiTokens, UserRoles;

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
