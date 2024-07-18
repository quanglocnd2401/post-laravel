!@extends('admin.layout.master')


@section('title')
    ADMIN
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Chỉnh sửa loại</h2>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name}}">
            </div>

            <div class="mt-3">
                <label for="parent_id">Danh mục cha: <b>{{$parentCatelogy->name ?? ''}}</b> </label>


                {{-- <select name="parent_id" id="" id="parent_id" class="form-control">

                    <option value="{{$parentCatelogy->id}}" selected disabled></option> --}}

                    {{-- <x-categories :categories="$categories" :level="0"/> --}}
                {{-- </select> --}}
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

