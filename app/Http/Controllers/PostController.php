<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post:: get();

        return view('posts/oneToOne')->with('posts', $posts);
        // echo "</pre>";
        // Print_r($posts);
    }
    public function hasmany()
    {
        $posts = Post::where('user_id', '1')->get();

        return view('posts/hasMany')->with('posts', $posts);
        // echo "</pre>";
        // Print_r($posts);
    }
}
