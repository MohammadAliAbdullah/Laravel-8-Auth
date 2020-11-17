<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'menu_id',
     
    ];

// relation 
// MenuPermission relation with Menu Model 
public function menus()
{
    return $this->belongsTo('App\Models\Menu');
    // return $this->belongsToMany(Menu::class, 'id');
}
public function Roles()
{
    return $this->belongsTo('App\Models\Role');
    // return $this->belongsToMany(Menu::class, 'id');
}

}
