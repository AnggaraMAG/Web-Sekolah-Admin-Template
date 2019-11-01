<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Siswa;

class GuruController extends Controller
{
    public function profile($idguru)
    {
        $title = 'Profile Guru';
        $guru = Guru::find($idguru);
        return view('guru.profile', compact('guru','title'));
    }
}
