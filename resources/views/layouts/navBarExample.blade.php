<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="{{ URL::asset('images/footer_logo.gif') }}" type="image/x-icon"> 


    <script src="{{ URL::asset('/js/jssor.slider.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jssor.js') }}"></script>
    <script src="{{ URL::asset('/js/epopup.js') }}"></script>
    <script src="{{ URL::asset('/js/epopups.js') }}"></script>
    <script src="{{ URL::asset('/js/jquery.mobile.customized.min.js') }}"></script>

    <link href="{{ URL::asset('/css/jssor.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/epop.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/stylesheet.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://dinbror.dk/bpopup/assets/style.min.css"> 
		<style>
				
				nav.navbar-webmaster { background: #1b242c;}
				nav.navbar-webmaster a { color: #fff; }
				nav.navbar-webmaster ul.navbar-nav a { color: #fff; border-style: solid; border-width: 2px 0 0 0; border-color:#1b242c; }
				nav.navbar-webmaster ul.navbar-nav a:hover,
				nav.navbar-webmaster ul.navbar-nav a:visited,
				nav.navbar-webmaster ul.navbar-nav a:focus,
				nav.navbar-webmaster ul.navbar-nav a:active { background:#3b4045; }
				nav.navbar-webmaster ul.navbar-nav a:hover {border-color: #5fb000; }
				nav.navbar-webmaster li.divider { background: #ccc; }
				nav.navbar-webmaster button.navbar-toggle { background:  #1b242c; border-radius: 2px; }
				nav.navbar-webmaster button.navbar-toggle:hover { background: #999; }
				nav.navbar-webmaster button.navbar-toggle > span.icon-bar { background: #fff; }
				nav.navbar-webmaster ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
				nav.navbar-webmaster ul.dropdown-menu > li > a { color: #444; }
				nav.navbar-webmaster ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
				nav.navbar-webmaster span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
				nav.navbar-webmaster span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }
		</style>

		<script type="text/javascript">
		      $(function(){
				    $(".dropdown").hover(            
				            function() {
				                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
				                $(this).toggleClass('open');
				                $('b', this).toggleClass("caret caret-up");                
				            },
				            function() {
				                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
				                $(this).toggleClass('open');
				                $('b', this).toggleClass("caret caret-up");                
				            });
				    });
		</script>
</head>

<body>		
		<nav class="navbar navbar-webmaster" >
    <div class="container">
    	<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">webmaster</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>Web Tools </span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">Bootstrap</a></li>
						<li><a href="#">Javascript</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>Web Tools </span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">Bootstrap</a></li>
						<li><a href="#">Javascript</a></li>
					</ul>
				</li>
				<li class="active"><a href="#">Sublime<span class="sr-only">(current)</span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dynamic <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">PHP</a></li>
						<li><a href="#">SQL</a></li>
						<li><a href="#">Jquery</a></li>
						<li><a href="#">Angular JS</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right search-form" role="search">
				<input type="text" class="form-control" placeholder="Search" />
			</form>
		</div>
	</div>
</nav>

<!--========================================================
                          CONTENT
=========================================================-->

<div>
		@yield('content')
<div>


<!--========================================================
                          FOOTER
=========================================================-->


</body>
</html>