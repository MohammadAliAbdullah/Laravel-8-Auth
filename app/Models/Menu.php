<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = "menus";
    protected $fillable = [
        'name',
        'url',
        'font_awsome',
        'branch_id',
        'organization_id',
    ];

    // protected $hidden = [
    //     'branch_id',
    //     'organization_id',
    // ];

    // relation 
    // Menu relation with MenuPermission Model
    public function menu_mermissions()
    {
        return $this->hasMany('App\Models\MenuPermission'); 
    }

}
