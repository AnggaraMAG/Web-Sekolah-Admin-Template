<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Siswa::all();
    }

    public function map($siswa): array
    {
        return [
            $siswa->nis,
            $siswa->nama,
            $siswa->tanggal_lahir,
            $siswa->agama,
            $siswa->jenis_kelamin,
            $siswa->alamat,
            $siswa->test(),
        ];
    }

    public function headings(): array
    {
        return [
            'NIS',
            'NAMA',
            'TANGGAL LAHIR',
            'AGAMA',
            'GENDER',
            'ALAMAT',
            'NILAI RATA-RATA'
        ];
    }
}
