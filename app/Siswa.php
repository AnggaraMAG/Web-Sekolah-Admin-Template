<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nis', 'nama', 'tanggal_lahir', 'agama', 'jenis_kelamin', 'alamat', 'avatar', 'user_id'];
    protected $dates = ['tanggal_lahir'];

    public function getNamaAttribute($nama)
    {
        return ucwords($nama);
    }
    public function getAlamatAttribute($alamat)
    {
        return ucwords($alamat);
    }
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
    // public function setNamaAttribute($nama)
    // {
    //     return strtolower($nama);
    // }

    public function test()
    {

        $total = 0;
        $hitung = 0;
        if ($this->mapel->isNotEmpty()) {
            foreach ($this->mapel as $mapel) {
                $total = $total + $mapel->pivot->nilai;
                $hitung++;
            }
            return round($total / $hitung);
        }
        return 0;
    }
}
