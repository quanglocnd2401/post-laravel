@extends('client.layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8  mb-5 mb-lg-0">
        <h2 class="h5 section-title">Recent Post</h2>

        @foreach ($articles as $key => $article)
                <x-article :article="$article"/>
        @endforeach

        <ul class="pagination justify-content-center">
            <li class="page-item page-item active ">
                <a href="#!" class="page-link">1</a>
            </li>
            <li class="page-item">
                <a href="#!" class="page-link">2</a>
            </li>
            <li class="page-item">
                <a href="#!" class="page-link">&raquo;</a>
            </li>
        </ul>
    </div>
    @include('client.layouts.sidebar')
</div>
@endsection
