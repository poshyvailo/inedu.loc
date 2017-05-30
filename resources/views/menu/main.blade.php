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
		<li {{ Request::is($el['link']) ? 'class=active' : null }}>
		    <a href="{{ $el['link']}}">{{ $el['title'] }}</a>
		</li>
		@endforeach
	    </ul>
	    @yield('registration')
	</div>

    </div>
</nav>