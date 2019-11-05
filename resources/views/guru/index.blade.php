@extends('admin.index')
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

                        <a href="{{route('guru.create')}}"class="btn btn-primary margin-top-30">Tambah Data Siswa</a>
                        <div class="right">
                            <a href="#" class="btn btn-info">Export Excel</a>
                            <a href="#" class="btn btn-danger">Export PDF</a>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="panel-body mytable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($teachers as $teacher)
                                <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->nama}}</td>
                                        <td>{{$teacher->telepon}}</td>
                                        <td>{{$teacher->alamat}}</td>
                                        <td class="colspan">
                                        <a href="/guru/{{$teacher->id}}/profile" class="fa fa-search"></a>
                                        <a href="#" class="lnr lnr-pencil"></a>
                                        <a href="#" guru-id="{{$teacher->id}}" class="lnr lnr-trash delete"></a>
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
        var guru_id = $(this).attr('guru-id');
        Swal.fire({
          title: 'Yakin dihapus?',
          text: "Mau dihapus data guru? dengan id "+guru_id+"!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes Delete!'
          }).then((result) => {
          if (result.value) {
              window.location = "/guru/"+guru_id+"/delete"
          }
          })
    });
</script>
@endsection
