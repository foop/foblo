@extends('layout')
@section('content')

<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
	<div class="header-text">
		<h2>Delete</h2>
		<p>Delete posts page</p>
	</div><!--div header text-->
</div><!--div container-->
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-center">		
			<h2>Do you want to destroy Post <em>"{{$post->title}}" (id:{{ $post->id }})?</em> </h2>	
			{{ Form::open(['url' => '/post/delete', 'class'=>'form']) }}	
			{{ Form::hidden('id', $post->id) }}

			<div class="form-group">
			<button class="btn btn-primary" type="submit" value="Submit" >
				<span class="glyphicon glyphicon-fire"></span> Burn it, burn it! 
			</button>
			
			<a href="{{ action('HomeController@home') }}" class="btn btn-warning"><span class="glyphicon glyphicon-stop"></span> No - keep it</a>
			</div><!--div form-group-->
			{{ Form::close() }}	
				
		</div><!--div jumbotron text-center-->
	</section>	
</div><!--div container-->
</div><!--div background-->
