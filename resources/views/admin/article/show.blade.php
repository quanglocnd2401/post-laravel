@extends('admin.layout.master')


@section('title')
    ADMIN
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
          <h1 class="text-center mt-5">{{$article->title}}</h1>
          <div class="d-flex justify-content-between">
            <p class="text-muted">Ngày đăng: {{$article->created_at}}</p>
            <a class="btn btn-warning" href="#">Duyệt</a>
          </div>

          <img src="image-url.jpg" class="img-fluid mb-4" alt="Hình ảnh bài viết">
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>{{{$article->content}}}</p>
            
          </div>
        </div>
    </div>
</div>


@endsection
