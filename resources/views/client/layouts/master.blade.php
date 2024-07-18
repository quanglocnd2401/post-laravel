<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    @include('client.layouts.header')
</head>

<body>
    <!-- navigation -->
    <header class="navigation">
        @include('client.layouts.navbar')
    </header>
    <!-- /navigation -->



    <section class="section-sm">
        <div class="container">
            @yield('content')
          
        </div>
    </section>

    @include('client.layouts.footer')


    <!-- JS Plugins -->
    <script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('plugins/plugins/slick/slick.min.js') }}"></script>

    <script src="{{ asset('plugins/plugins/instafeed/instafeed.min.js') }}"></script>


    <!-- Main Script -->
    <script src="{{ asset('plugins/js/script.js') }}"></script>
</body>

</html>
