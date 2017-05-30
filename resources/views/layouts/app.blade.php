<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
	<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	@include('menu.main')
	<main>
	    <div class="container">
		@yield('content')
	    </div>
	</main>
    </body>
</html>
