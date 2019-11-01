<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        // $siswa = Siswa::all();
        // $siswa->map(function ($s) { //map() adalah helper untuk chaining/menyatukan
        //sebelah kiri variabel dan sebelah kanan memasukkan data function yang dibuat kedalam variabel sebelah kiri !!!
        //     $s->rataRataNilai = $s->test();
        //     return $s;
        // });
        //sortbyDesc = untuk mengurutkan dari yang terbesar
        //take()  = untuk menampilkan jumlah data yang ingin ditampilkan
        // $siswa = $siswa->sortByDesc('rataRataNilai')->take(10);
        //dd($siswa);
        return view('admin.dashboard', compact('title'));
    }
}
