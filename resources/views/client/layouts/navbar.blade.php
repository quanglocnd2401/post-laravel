<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="{{ route('home') }}">
            <img class="img-fluid" width="100px" src="{{ asset('reader/images/logo.png') }}"
                alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
            <ul class="navbar-nav mx-auto">


                @foreach ($categories as $category)
                    @if ($category->parent_id == null)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ $category->name }} <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">

                                @foreach ($categories as $sub_category)
                                    @if ($sub_category->parent_id == $category->id)
                                        <a class="dropdown-item" href="{{route('article.postcate',$sub_category)}}">{{ $sub_category->name }}</a>
                                    @endif
                                @endforeach

                            </div>
                        </li>
                    @endif
                @endforeach


                <li class="nav-item ">

                </li>

                <li class="nav-item">

                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" style="width: 300px" aria-labelledby="navbarDropdown">
                            <a class="nav-link border-bottom" href="{{ route('article.manage', Auth::user()) }}"> Quản lí bài viết</a>
                            <a class="nav-link border-bottom" href="{{ route('article.create') }}">Tạo bài viết</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>
</div>
