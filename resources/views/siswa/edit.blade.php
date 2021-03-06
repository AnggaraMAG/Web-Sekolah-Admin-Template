@extends('admin.index')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4> Form Edit Data Siswa</h4>
                            </div>
                            <div class="panel-body">
                                <form action="/siswa/{{$edit->id}}" method="POST" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                        <div class="panel-body">
                                            <label for="nis">NIS</label>
                                                <input type="number" id="nis" name="nis" class="form-control @error('nis') is-invalid @enderror" value="{{$edit->nis}}">
                                                @error('nis')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                                <br>
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$edit->nama}}">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" value="{{$edit->tanggal_lahir->format('Y-m-d')}}"class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir">
                                                @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="agama">Agama</label>
                                                <select name="agama" id="agama" class="form-control" value="{{$edit->agama}}">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                                <br>
                                                <label class="fancy-radio" value="{{$edit->jenis_kelamin}}">
                                                        <input name="jenis_kelamin" checked value="L" type="radio">
                                                        <span><i></i>Laki-Laki</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input name="jenis_kelamin" value="P" type="radio">
                                                        <span><i></i>Perempuan</span>
                                                    </label>
                                                    <br>
                                                    <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$edit->alamat}}">
                                                @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="avatar">Avatar</label>
                                            <input type="file" name="avatar"   class ="@error('avatar') is-invalid @enderror" value="{{$edit->avatar}}">
                                            @error('avatar')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                                <br>
                                                <button type="submit" class="btn btn-primary" onclick=" return confirm('yakin diubah?')">Edit Data Siswa</button>
                                                <a href="/siswa" class="btn btn-success">Back</a>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
