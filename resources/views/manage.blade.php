@extends('client.layouts.master')


@section('content')
<div class="container">
    <div class="row no-gutters justify-content-center">
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">

            <img class="author-image"
                src="https://www.gravatar.com/avatar/df5fe0c7d20b494dd2c68e0d8ef9bbf2?s=320&pg&d=identicon">

        </div>
        <div class="col-md-8 col-lg-6 text-center text-md-left">
            <h3 class="mb-2">{{ Auth::user()->name }}</h2>
                <strong class="mb-2 d-block">{{ Auth::user()->email }}</strong>
                <div class="content">
                    <p>Donec nisi dolor, consequat vel pretium id, auctor in dui. Nam iaculis, neque ac
                        ullamcorper.</p>

                </div>

                <a class="post-count mb-1" href="author-single.html#post"><i
                        class="ti-pencil-alt mr-2"></i><span class="text-primary">2</span> Posts by this
                    author</a>
                <ul class="list-inline social-icons">

                    <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

                    <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

                    <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

                    <li class="list-inline-item"><a href="#"><i class="ti-link"></i></a></li>

                </ul>
        </div>
    </div>
</div>
<section class="section-sm" id="post">
    <div class="container">
        <div class="row">

            @foreach ($articles as $article)
            <div class="col-lg-8 mx-auto">
                <x-article :article="$article" :user="2"/>
            </div>
            @endforeach



        </div>
    </div>
</section>
@endsection
