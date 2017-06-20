<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/moment.min.js" type="text/javascript"></script>
    <script src="/js/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="/js/locale/ru.js" type="text/javascript"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
@include('menu.main')
<main>
    @if (Auth::guest())
        <div class="container">
	    @include('alerts.success')
            @include('alerts.danger')
            @include('alerts.warning')
            @yield('content')
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('menu.left-menu')
                </div>
                <div class="col-md-9">
                    @include('alerts.success')
                    @include('alerts.danger')
                    @include('alerts.warning')
                    @yield('content')
                </div>
            </div>
        </div>
    @endif
</main>
</body>
</html>
