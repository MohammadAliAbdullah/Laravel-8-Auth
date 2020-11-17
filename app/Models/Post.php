<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'user_id', 'category_id','status'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categorie(){
        return $this->belongsTo(Category::class);
    }
    
}
