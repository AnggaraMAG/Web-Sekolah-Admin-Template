<?php

use App\Siswa;
use App\Guru;
use App\Mapel;

function ranking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function ($s) { //map() adalah helper untuk chaining/menyatukan
        //sebelah kiri variabel dan sebelah kanan memasukkan data function yang dibuat kedalam variabel sebelah kiri !!!
        $s->rataRataNilai = $s->test();
        return $s;
    });
    //sortbyDesc = untuk mengurutkan dari yang terbesar
    //take()  = untuk menampilkan jumlah data yang ingin ditampilkan
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(10);
    return $siswa;
}
function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}

function totalMapel()
{
    return Mapel::count();
}
