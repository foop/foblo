@extends('layout')
@section('content')
<h1>Blog</h1>
	@if(Auth::check()) 
	<div class="jumbotron">
	<h2>New Psot</h2>
	<div class="form-group">
	{{ Form::open(array('url' => '/post/new') ) }}
	{{ Form::label('Subject') }}
	{{ Form::text('subject', 'Enter your amazing subject', array('class' => 'form-control') ) }}
	<br />
	{{ Form::label('Content') }}
	{{ Form::textarea('content', 'Enter your amazing content', array('class' => 'form-control', 'rows' => 4 ) ) }}
	<br />
	
	
	<button class="btn btn-primary" type="submit" value="Submit" >
		<span class="glyphicon glyphicon-ok"></span> Submit
	</button>

		
	{{ Form::close() }}
	</div> <!--div form group-->
	</div> <!--div jumbotron-->
	@endif
	@if (empty ($posts) )
		<p> Nothing here :( </p>
	@else
		@foreach ($posts as $post) 
			{{ $post }}
		@endforeach
	@endif
@stop
