<<<<<<< HEAD
<?php
$menu = [
	['title' => 'Home', 'link' => '/'],
	['title' => 'About', 'link' => '/about'],
	['title' => 'Contacts', 'link' => '/contacts'],
];

?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="/">inEdu</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	    <ul class="nav navbar-nav">
		@foreach ($menu as $el)
		<li<?php echo Request::is($el['link']) ? ' class="active"' : null ?>>
		    <a href="{{ $el['link']}}">{{ $el['title'] }}</a>
		</li>
		@endforeach
	    </ul>

	    @yield('registration')

	    <ul class="nav navbar-nav navbar-right">
		@if (Auth::guest())
		<li<?php echo Request::is('register') ? ' class="active"' : null ?>>
		    <a href="{{ url('/register') }}">Регистрация</a>
		</li>
		<li <?php echo Request::is('login') ? ' class="active"' : null ?>>
		    <a href="{{ url('/login') }}">Войти</a>
		</li>
		@else
		<li>LOGIN</li>
		@endif
	    </ul>
	</div>

    </div>
</nav>