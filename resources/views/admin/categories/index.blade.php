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

                    <x-admin-category :categories="$categories" />

                </tbody>
            </table>
        </div>
    </div>
@endsection
