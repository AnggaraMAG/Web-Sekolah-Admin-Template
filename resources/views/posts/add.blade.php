@extends('admin.index')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 centered">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Add new Post</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form action="{{route('post.create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="col-md-8 centered">
                                    <br>
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <br>
                                    <label for="content">Content</label>
                                    <textarea class="form-control" name=content id="content" cols="40" rows="30"></textarea>
                                    @error('content')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <br>
                                </div>
                                <div class="col-md-4 centered">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                      </div>
                                      <img id="holder" style="margin-top:15px;max-height:100px;">
                                      <div>

                                          <button type="submit" class="btn btn-primary" >Tambah Post</button>
                                      </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );

            $(document).ready(function(){
                $('#lfm').filemanager('image');
            });
    </script>
@endsection
