<?php

namespace App\Modules\Admin\Role\Models;

use App\Modules\Admin\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'alias',
        'title',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function perms()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function savePermissions($perms)
    {
        if(!empty($perms)){
            $this->perms()->sync($perms);
        } else {
            $this->perms()->detach();
        }
    }
}
