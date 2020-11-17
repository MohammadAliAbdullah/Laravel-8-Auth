<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'disply_name',
        'description',
    ];

    protected $hidden = [
        'branch_id',
        'company_id',
    ];
}
