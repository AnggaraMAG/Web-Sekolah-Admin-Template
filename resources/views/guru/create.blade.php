@extends('admin.index')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 centered">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4> Form Tambah Data Guru</h4>
                            </div>
                            <div class="panel-body">
                                <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="panel-body">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="telepon">Telepon</label>
                                                <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{old('telepon')}}">
                                                @error('telepon')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{old('alamat')}}">
                                                @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <label for="Matapelajaran">Matapelajaran</label>
                                                <input type="text" class="form-control @error('Matapelajaran') is-invalid @enderror" id="Matapelajaran" name="Matapelajaran" value="{{old('Matapelajaran')}}">
                                                @error('Matapelajaran')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-primary" onclick=" return confirm('apakah anda sudah yakin dengan data anda? periksa kembali klik Oke jika sudah yakin')">Tambah Data Guru</button>
                                                <a href="{{route('guru.index')}}" class="btn btn-success">Back</a>
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
