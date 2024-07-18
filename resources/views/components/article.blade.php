@props(['article', 'user'])


<article class="card mb-4">
    <div class="post-slider">
        <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="post-thumb">
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="mb-3"><a class="post-title" href="post-details.html">{{ $article->title }} </a></h3>
        </div>

        <ul class="card-meta list-inline">
            <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                    <img src="images/john-doe.jpg">
                    <span>{{ $article->user->name }} </span>
                </a>
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
        <p> {{ Str::limit($article->content, 50) }}</p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('article.show', $article) }}" class="btn btn-outline-primary">Chi tiết</a>
                <a class="btn btn-info" href="{{ route('article.edit', $article) }}">Sửa</a>
            </div>

            <form action="{{ route('article.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Có chắc muốn xóa không')">Xóa</button>
            </form>
        </div>


    </div>
</article>
