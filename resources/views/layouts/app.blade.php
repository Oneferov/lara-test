<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @yield('before-css')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    @yield('page-css')
    @yield('datatable')
</head>
<body>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            @include('layouts.navbar')
            <div class="main-content container-fluid">
                <div class="page-title">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            @if ($error !== 'null')
                            <li>{{ $error }}</li>
                            @endif
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('page-js')
    @yield('bottom-js')
</body>
</html>
