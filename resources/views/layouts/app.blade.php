<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/fonts.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>
<body class="navbar-top">
<div id="app" style="">

    @include('layouts.partials.navbar')

    <div class="page-container">
        <div class="page-content">
            @include('layouts.partials.sidebar')
            <div class="content-wrapper">
                <div class="page-header page-header-default">
                    @yield('page-header')

                    @yield('breadcrumb')
                </div>
                <div class="content">
                @yield('content')
                <!-- Footer -->
                    <div class="footer text-primary text-bold">
                        @include('layouts.partials.footer')
                    </div>
                    <!-- /footer -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/bundle.min.js') }}"></script>
</body>
</html>
