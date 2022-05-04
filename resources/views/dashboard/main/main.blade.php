<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/assets/css/dashboard.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('page-css')
    @yield('subpage-css')
</head>
<body class="dashboard-body">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<div class="flex-dashboard-body">
    @include('dashboard.main.sidebar')


    @yield('content')
</div>






{{--@include('home.main.footer')--}}
@yield('page-script-left')
@yield('page-script')
@yield('subpage-scripts')
@yield('template-custom-script')
<style>
    .dashboard-body{
        position: relative;
        width: 100%;
    }
</style>
</body>

</html>
