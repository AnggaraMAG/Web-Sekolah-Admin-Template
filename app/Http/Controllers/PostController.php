<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Post';
        $post = Post::all();
        return view('posts.index', compact('post', 'title'));
    }
}
