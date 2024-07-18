@extends('client.layouts.master')

@section('content')
    <h1 class="text-center">Sửa bài viết</h1>

    @if (session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong> 
        </div>
    @endif

    <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="hidden" name="user_id" id="" value=" {{ Auth::user()->id }} ">
        </div>

        <div class="form-group">
            <label for="category_id">Thể loại:</label>
            <select name="category_id" class="form-control" id="category_id">
                {{-- Danh mục cha --}}
                @foreach ($categories as $cate)
                    @if ($cate->parent_id == null)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endif
                    {{-- Danh mục con --}}
                    @foreach ($categories as $sub_cate)
                        @if ($sub_cate->parent_id == $cate->id)
                            <option value="{{ $sub_cate->id }}"
                                {{ $article->category->id == $sub_cate->id ? 'selected' : '' }}>
                                --{{ $sub_cate->name }}
                            </option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="img">Ảnh</label>
            <input type="file" id="img" name="img">
            <img src="{{ Storage::url($article->img) }}" alt="" width="200px">
        </div>
        <hr>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" class="form-control" value="{{ $article->title }}" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>
                {{ $article->content }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Đăng bài</button>
    </form>
@endsection
