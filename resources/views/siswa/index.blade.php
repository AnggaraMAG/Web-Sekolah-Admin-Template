@extends('admin.index')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
    <div class="main">
        <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div>
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                        </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Daftar Siswa</h1>

                            <a href="/siswa/tambah"class="btn btn-primary margin-top-30">Tambah Data Siswa</a>
                            <div class="right">
                                <a href="/siswa/exportexcel" class="btn btn-info">Export Excel</a>
                                <a href="/siswa/exportpdf" class="btn btn-danger">Export PDF</a>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="panel-body mytable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">NIS</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tanggal Lahir</th>
                                        <th class="text-center">Agama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Rata-rata Nilai</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($students as $student)
                                    <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$student->nis}}</td>
                                            <td><a href="/siswa/{{$student->id}}/profile">{{$student->nama}}</a></td>
                                            <td>{{$student->tanggal_lahir->format('d-m-Y')}}</td>
                                            <td>{{$student->agama}}</td>
                                            <td>{{$student->jenis_kelamin}}</td>
                                            <td>{{$student->alamat}}</td>
                                            <td>{{$student->test()}}</td>
                                            <td class="colspan">
                                                <a href="/siswa/{{$student->id}}/profile" class="fa fa-search"></a>
                                            <a href="/siswa/edit/{{$student->id}}" class="lnr lnr-pencil"></a>
                                            <a href="#" class="lnr lnr-trash delete" siswa-id="{{$student->id}}"></a>
                                            </form>
                                            </td>
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
@section('script')
  <script>
      $('.delete').click(function(){
          var siswa_id = $(this).attr('siswa-id');
          Swal.fire({
            title: 'Yakin dihapus?',
            text: "Mau dihapus data siswa? dengan id "+siswa_id+"!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete!'
            }).then((result) => {
            if (result.value) {
                window.location = "/siswa/"+siswa_id+"/delete"
            }
            })
      });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
