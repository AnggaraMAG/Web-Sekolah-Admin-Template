@extends('admin.index')
@section('head')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="main">
<div class="main-content">
    <div class="container-fluid">
            <div>
                    @if (session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                    @endif
            </div>
            <div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
            </div>
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" height="90" width="100">
                            <h3 class="name">{{$siswa->nama}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    {{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    {{$siswa->test()}}<span>Rata-rata Nilai</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    2174 <span>Points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->
                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Data Diri</h4>
                            <ul class="list-unstyled list-justify">
                                <li>NIS<span>{{$siswa->nis}}</span></li>
                                <li>Nama <span>{{$siswa->nama}}</span></li>
                                <li>Tanggal Lahir <span>{{$siswa->tanggal_lahir->format('d-m-Y')}}</span></li>
                                <li>Agama <span>{{$siswa->agama}}</span></li>
                                <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                                <li>Alamat <span>{{$siswa->alamat}}</span></li>
                            </ul>
                        </div>
                    <div class="text-center"><a href="/siswa/edit/{{$siswa->id}}" class="btn btn-primary">Edit Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->
                <!-- RIGHT COLUMN -->
                <div class="profile-right">

                    <!-- END AWARDS -->
                    <!-- TABBED CONTENT -->
                    <div class="custom-tabs-line tabs-line-bottom left-aligned">
                    </div>
                    <div class="tab-content">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapel" name="mapel">
                                    Tambah Mata Pelajaran
                            </button>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mata Pelajaran</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>SEMESTER</th>
                                            <th>NILAI</th>
                                            <th>GURU</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa->mapel as $mapel)
                                        <tr>
                                            <td>{{$mapel->kode}}</td>
                                            <td>{{$mapel->nama}}</td>
                                            <td>{{$mapel->semester}}</td>
                                        <td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan Nilai">{{$mapel->pivot->nilai}}</a></td>
                                        <td><a href="/guru/{{ $mapel->guru_id}}/profile">{{ $mapel->guru->nama }}</a></td>
                                        <td>
                                        <a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('yakin dihapus?')">Delete</a>
                                        </td>
                                        </tr>                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel">
                            <div id="chartnilai">

                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- END TABBED CONTENT -->
                </div>
                <!-- END RIGHT COLUMN -->
            </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="mapel" tabindex="-1" role="dialog" aria-labelledby="mapel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="mapel">Tambah Pelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="/siswa/{{$siswa->id}}/tambahnilai" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="panel-body">
                <label for="mapel">Mata Pelajaran</label>
                <select name="mapel" id="mapel" class="form-control">
                    @foreach ($matapelajaran as $mp)
                    <option value="{{$mp->id}}">{{$mp->nama}}</option>
                    @endforeach
                </select>
                <br>
                <label for="nilai">Nilai</label>
                <input type="number" id="nilai" nilai="nilai" class="form-control @error('nilai') is-invalid @enderror" value="{{old('nilai')}}" name="nilai">
                @error('nilai')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
@stop
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$(document).ready(function() {
        $('.nilai').editable();
    });
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// Create the chart
Highcharts.chart('chartnilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Highchart Nilai Siswa'
    },
    subtitle: {

    },
    xAxis: {
        categories:{!! json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!! json_encode($data) !!}


    }]
});
</script>

@endsection
