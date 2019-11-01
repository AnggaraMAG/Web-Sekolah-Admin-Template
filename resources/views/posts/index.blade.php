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
                            <h1 class="panel-title">Daftar POSTS</h1>

                            <a href="#"class="btn btn-primary margin-top-30">Add Post</a>
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
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Content</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Thumbnail</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($post as $p)
                                    <tr>
                                        <td>{{$p->user->role}}</td>
                                        <td>{{$p->title}}</td>
                                        <td>{{$p->content}}</td>
                                        <td>{{$p->slug}}</td>
                                        <td>{{$p->thumbnail}}</td>
                                        <td>{{$p->created_at->format('d-M-y')}}</td>
                                            <td>
                                                {{-- view disini menggunakan penamaan unik,tambahkan target untuk tidak menutup dashboard/langsung berpindah ke tab baru --}}
                                            <a target="_blank" href="{{route('site.single.post',$p->slug)}}" class="btn btn-success btn-sm">View</a>
                                            <a href="#" class="btn btn-primary btn-sm" >Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                            </td>
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
{{--  --}}
@endsection
