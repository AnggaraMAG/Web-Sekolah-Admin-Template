<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Mapel;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Siswa';
        $students = Siswa::all()->sortBy('nis');

        return view('siswa.index', compact('title', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data';
        return view('siswa.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nis' => 'required|size:5|unique:siswas,nis',
            'nama' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:users,email',
            'avatar' => 'mimes:png,jpg',
            'alamat' => 'required',
        ]);
        //insert ke data users
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //insert ke data siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('status', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = Siswa::findOrFail($id);
        $title = 'edit data siswa';
        return view('siswa.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|size:5|unique:siswas,nis,' . $id,
            'nama' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);
        // dd($request->all());
        $update = Siswa::findOrFail($id);
        $update->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $update->avatar = $request->file('avatar')->getClientOriginalName();
            $update->save();
        }
        return redirect('/siswa')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect('/siswa')->with('status', 'Data Berhasil Dihapus');
    }

    public function profile($id)
    {
        $title = 'Profile Siswa';
        $siswa = Siswa::findOrFail($id);
        $matapelajaran = Mapel::all();

        //menyiapkan data untuk charts
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        // dd($data);

        // dd($categories);

        // dd($matapelajaran);
        return view('siswa.profile', compact('title', 'siswa', 'matapelajaran', 'categories', 'data'));
    }

    public function tambahnilai(request $request, $idsiswa)
    {
        $siswa = Siswa::findOrFail($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $idsiswa . '/profile')->with('gagal', 'Mata Pelajaran Sudah ada!!');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('siswa/' . $idsiswa . '/profile')->with('status', 'Mata Pelajaran Berhasil Ditambah!');
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::findOrFail($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('status', 'Data Nilai Berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', compact('siswa'));
        return $pdf->download('siswa.pdf');
    }
}
