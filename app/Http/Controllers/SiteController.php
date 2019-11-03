<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.home', compact('posts'));
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('sites.singlepost', compact('post'));
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postregister(Request $request)
    {
        // $request->validate([
        //     'nis' => 'required|size:5|unique:siswas,nis',
        //     'nama' => 'required|string|max:10',
        //     'tanggal_lahir' => 'required|date',
        //     'agama' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'alamat' => 'required',
        // ]);
        //insert ke data users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();
        $request->request->add(['user_id' => $user->id]);
        Siswa::create($request->all());
        return redirect('/')->with('status', 'Register Success');
    }
}
