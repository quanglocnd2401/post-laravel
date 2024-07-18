@extends('client.layouts.master')


@section('content')
    <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
            <article>
                <div class="post-slider mb-4">
                    <img src="{{ Storage::url($article->img) }}" class="card-img" alt="post-thumb">
                </div>
                <h1 class="h2"> {{ $article->title }} </h1>
                <ul class="card-meta my-3 list-inline">
                    <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                            <img src="images/john-doe.jpg">
                            <span>{{ $article->user->name }}</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-timer"></i>2 Min To Read
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-calendar"></i> {{ $article->created_at }}
                    </li>
                    <li class="list-inline-item">
                        <ul class="card-meta-tag list-inline">
                            <li class="list-inline-item"><a href="tags.html">Color</a></li>
                            <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                            <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="content">
                    <p>
                        {{ $article->content }}
                    </p>
                </div>
            </article>

        </div>

        <div class="col-lg-9 col-md-12">
            <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>
                @foreach ($comments as $comment)

                <x-comment
                :content="$comment->comment"
                :username="$comment->user->name"
                :time="$comment->created_at"
                />

                @endforeach


            </div>

            <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form action="{{route('article.comment', $article)}}"  method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group col-md-12">
                            <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Comment Now</button>
                </form>
            </div>
        </div>

    </div>
@endsection
