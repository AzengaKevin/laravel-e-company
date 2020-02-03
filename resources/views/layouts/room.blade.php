<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary" style="min-height: 75px;">
        @include('partials.nav')
    </nav>
    <div class="page-wrapper chiller-theme toggled">

        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#"><i class="fas fa-bars"></i></a>

        @include('partials.sidebar')
        <!-- sidebar-wrapper  -->

        <main class="page-content">
            @yield('content')
        </main>
        <!-- page-content" -->
    </div>
</div>
</body>
</html>
