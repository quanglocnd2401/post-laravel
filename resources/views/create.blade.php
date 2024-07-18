@extends('client.layouts.master')

@section('content')
<h1  class="text-center">Tạo bài viết</h1>
<form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <input type="hidden" name="user_id" id="" value=" {{Auth::user()->id}} ">
    </div>

    <div class="form-group">
        <label for="category_id">Thể loại:</label>
        <select name="category_id" class="form-control" id="category_id">
            @foreach ($categories as $cate)

                @if ($cate->parent_id == null)
                <option value="{{$cate->id}}">{{$cate->name}} </option>
                @endif

                @foreach ($categories as $sub_cate)
                    @if ($sub_cate->parent_id == $cate->id)
                     <option value="{{$sub_cate->id}}">--{{$sub_cate->name}} </option>
                    @endif
                @endforeach

            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="img">Ảnh</label>
        <input type="file" id="img" name="img">
    </div>
    <hr>
    <div class="form-group">
        <label for="title">Tiêu đề:</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="content">Nội dung:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Đăng bài</button>
</form>
@endsection

