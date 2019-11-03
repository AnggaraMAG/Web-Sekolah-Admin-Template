<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Post';
        $posts = Post::all();
        return view('posts.index', compact('posts', 'title'));
    }

    public function add()
    {
        $title = 'Tambah Post';
        return view('posts.add', compact('title'));
    }

    public function create(Request $request)
    {
        $posts = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->route('posts.index')->with('sukses', 'Post Berhasil Ditambahkan!');
    }
}
