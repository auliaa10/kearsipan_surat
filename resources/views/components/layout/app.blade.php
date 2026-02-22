<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? 'Arsip DPMPTSP' }}</title>
    <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}">
</head>

<body>
    <div class="preloader">
        <div class="lds-rippel">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    {{-- main wrapper --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        {{-- Sidebar layout --}}
        <x-layout.sidebar/>

        {{-- body wrapper --}}
        <div class="body-wrapper">
            {{-- navbar --}}
            <x-layout.header/>

            {{-- main content --}}
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
    </div>


    <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/dashboard.js') }}"></script>
</body>

</html>
