<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // protected $table = 'roles';
    protected $fillable = [
        'name',
        'disply_name',
        'description',
        'branch_id',
        'organization_id',
    ];


    public function user_roles()
    {
        return $this->hasOne('App\Models\UserRole', 'user_roles', 'role_id');
    }
    
}
