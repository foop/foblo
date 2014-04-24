<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	

    <title>foop blog</title>

	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Allerta|Trade+Winds' rel='stylesheet' type='text/css'>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<!-- jquery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Custom styles for this template -->
	{{ HTML::style('css/style.css'); }}

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"> foop</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/about"><span class="glyphicon glyphicon-info-sign"></span> About Me</a></li>
            <!--<li><a href="/contact"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>-->
			@if (Auth::check())
				<li>
				<a href="{{ action('AdminController@flogout') }}" class="btn btn-danger">
					<span class="glyphicon glyphicon-log-out" ></span> logout {{{ Auth::user()-> user_name }}}
				</a>
				</li>
			@endif	
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container" >

      <div class="starter-template">
		@if (Session::has('errors'))
		<div class="errors">
			{{ HTML::ul($errors->all(), array('class'=>'errors bg-danger text-danger'))}}
		</div>
		@endif 
		@if (Session::has('messages'))
		<div class="messages bg-warning text-warning">
			<?php $messages = Session::get('messages'); ?>
			@foreach($messages as $message) 
				<ul>{{ $message }} </ul>
			@endforeach
		</div>
		@endif 
		@yield('content')
      </div>
	  <div id="gnu-cage">
	  {{HTML::image('images/gnu_cartoon.png', 'cartoon picture of gnu', array('id' => 'gnu' )) }}
	  </div>



    </div><!-- /.container -->
	<footer>
		<div class="container text-muted">
		<span class="author">Dominik Danter aka foop</span> | See also: <a href="http://socialnerds.org">socialnerds.org</a>
		</div>
	</footer>
	<script>
		var endOfAnimation = false;
		var count = 0;
		var x = 0;
		function getNextX() {
			x = 100 * Math.random() * Math.sin(count) + 1;
			//alert(x);
			count++;
			if ( count == 100 ) endOfAnimation = true;
			return x;
		}

		function animate(ele) {
			if ( endOfAnimation ) return;
			x = getNextX();
			ele.animate({margin: x}, 50, animate(ele));
			//ele.animate({padding: "20px"});
			//ele.animate({padding: 20});
		}


		$(document).ready(function() {
			$("#gnu").click(function() { 
				animate($("#gnu"));
			})
				/*for (var i = 0; i < 100; i++) {
					$("#gnu").animate({padding: "20px"}, 1, "linear", function() {
						$("#gnu").animate({padding: "0px"}, 1);
					});
				};*/
		});
	</script>
  </body>
</html>
