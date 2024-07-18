@extends('admin.layout.master')


@section('title')
    ADMIN
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Tạo loại tin</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mt-3">
                <label for="parent_id">Danh mục cha:</label>


                <select name="parent_id" id="" id="parent_id" class="form-control">

                    <option value="" selected>Trống</option>

                    <x-categories :categories="$categories" :level="0" />

                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
