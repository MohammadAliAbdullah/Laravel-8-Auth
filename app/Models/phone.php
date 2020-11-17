<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'phone'
    ];
     // Eloquent: Relationships ORM => One To One ... 
     // When Use phone model
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
