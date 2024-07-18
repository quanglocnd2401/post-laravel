@props(['content' , 'username','time'])
@php
    use Carbon\Carbon;
    $timeDiff = Carbon::parse($time)->diffForHumans();
@endphp

    <div class="media d-block d-sm-flex mb-4 pb-4">
        <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
            <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
        </a>
        <div class="media-body">
            <a href="#!" class="h4 d-inline-block mb-3">{{ $username }}</a>

            <p>{{ $content }}</p>

            <span class="text-black-800 mr-3 font-weight-600">{{$timeDiff}}</span>
            <a class="text-primary font-weight-600" href="#!">Reply</a>
        </div>
    </div>

