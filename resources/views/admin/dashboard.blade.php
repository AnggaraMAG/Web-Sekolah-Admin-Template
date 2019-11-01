@extends('admin.index')
@section('head')
@endsection
@section('content')
<div class="main">
<div class="main-content">
<div class="container-fluid">
    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-3">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <p>
                                <span class="number">{{totalSiswa()}}</span>
                                <span class="title">Total Siswa</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{totalGuru()}}</span>
                                    <span class="title">Total Guru</span>
                                </p>
                            </div>
                        </div>
                    <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-book"></i></span>
                                <p>
                                    <span class="number">{{totalMapel()}}</span>
                                    <span class="title">Total Matapelajaran</span>
                                </p>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
<div class="col-md-6">
<div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>Ranking</strong></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead >
                    <tr>
                        <th class="text-center">RANKING</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">Nilai Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(ranking5Besar() as $s)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->rataRataNilai}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
                </div>
            </div>
        </div>
        </div>
</div>
@endsection
