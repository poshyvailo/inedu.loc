<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
        <meta charset="UTF-8">
        <title>Home</title>
	<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/parallaxsoon3.js" type="text/javascript"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="/css/style.css" rel="stylesheet" type="text/css"/>	
=======
    <meta charset="UTF-8">
    <title>Home</title>
    <script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
>>>>>>> master
</head>
<body>
@include('menu.main')
<main>
    @if (Auth::guest())
        <div class="container">
            @yield('content')
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('menu.left-menu')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif
</main>
</body>
</html>
