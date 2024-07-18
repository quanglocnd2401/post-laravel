<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.header')
</head>

<body class="sb-nav-fixed">


    @extends('admin.layout.sidebar')


    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    @yield('content')
                </div>
            </main>

            @include('admin.layout.footer')

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('theme/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('theme/assets/demo/chart-area-demo.js') }} "></script>
    <script src="{{ asset('theme/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('theme/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
