<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{

    public function index()
    {
        $title = 'Daftar Guru';
        $teachers = Guru::all();
        // dd($teachers->all());
        return view('guru.index', compact('title', 'teachers'));
    }

    public function create(Request $request)
    {
        $title = 'Form Tambah Guru';
        return view('guru.create', compact('title'));
    }

    public function store(Request $request)
    {
        $guru = Guru::create($request->all());

        return redirect('/guru')->with('status', 'Data Berhasil Ditambah');
    }

    public function profile($idguru)
    {
        $title = 'Profile Guru';
        $guru = Guru::find($idguru);
        return view('guru.profile', compact('guru', 'title'));
    }

    public function destroy($id)
    {
        Guru::destroy($id);
        return redirect('/guru')->with('status', 'Data Guru Berhasil dihapus!!');
    }
}
