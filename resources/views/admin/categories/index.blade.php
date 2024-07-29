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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent ID</th>
                        <th>Created at</th>
                        <th>Update at</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    {{-- <x-admin-category :categories="$categories" /> --}}

                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <th>
                            <a class="btn btn-secondary" href="{{route('admin.categories.edit', $category )}}">Sửa</a>

                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                        

                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
