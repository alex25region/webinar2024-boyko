<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Webinar2024 | @yield('title')</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport"
    />
{{--    <link--}}
{{--        rel="icon"--}}
{{--        href="{{ asset('assets/img/logo.svg') }}"--}}
{{--        type="image/x-icon"--}}
{{--    />--}}

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {families: ["Public Sans:300,400,500,600,700"]},
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>

</head>
<body>
<div class="wrapper">
        @include('_layouts.sidebar')

    <div class="main-panel">
        @include('_layouts.topbar')
        <div class="container">
            <div class="page-inner">
                @yield('content')
            </div>
        </div>
        @include('_layouts.footer')
    </div>

</div>
@include('_layouts.notification')
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment.js (ru) -->
<script src="{{ asset('assets/js/plugin/moment/moment-with-locales.min.js') }}"></script>

<!-- Chart JS -->
{{--<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>--}}

<!-- jQuery Sparkline -->
{{--<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>--}}

<!-- Chart Circle -->
{{--<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>--}}

<!-- Datatables -->
{{--<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>--}}

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Sweet Alert -->
{{--<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>


</body>
</html>
