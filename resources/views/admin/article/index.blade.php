@extends('admin.layout.master')


@section('title')
    ADMIN
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Loại tin tức
        </div>

        @php
            if(isset($success)){
                echo $success;
            }
        @endphp

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Loại</th>
                        <th>Thời gian tạo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($articles as $article)
                    <tr>
                        <th>STT</th>
                        <th>{{$article->title}}</th>
                        <th>{{$article->user->name}}</th>
                        <th>{{$article->category->name}}</th>
                        <th>{{$article->created_at}}</th>
                        <th>
                            <a class="btn btn-info" href="{{route('admin.article.show',$article)}}">Xem</a>
                            <a class="btn btn-danger" href="{{route('admin.article.destroy',$article)}}">Xóa</a>

                            @if ($article->is_active === 1)
                                    <button type="submit" class="btn btn-success">Đã duyệt</button>
                            @else
                                <form action="{{route('admin.article.update', $article)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">Duyệt</button>
                                </form>
                            @endif




                        </th>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
