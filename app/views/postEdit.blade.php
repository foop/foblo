@extends('layout')
@section('content')
<section class="header section-padding">
<div class="background">&nbsp;</div>
<div class="container">
	<div class="header-text">
		<h2>Edit</h2>
		<p>Edit psot page</p>
	</div><!--div header-text-->
</div><!--div container-->
</section>

<div class="container">
<section class="section-padding">
<div class="jumbotron">
<h2>Edit Psot</h2>
{{ Form::open(['url'=> '/post/edit', 'class' => 'form']) }}
{{ Form::hidden('id', $post->id) }}

<div class="form-group">
	{{ Form::label('subject', 'Subject:') }}
	{{ Form::text('subject', $post->title, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('content', 'Content:') }}
	{{ Form::textarea('content', $post->content, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<button class="btn btn-primary" type="submit" value="Submit" >
		<span class="glyphicon glyphicon-save"></span> Save Post
	</button>
	
</div>

{{ Form::close() }}

</div><!--div jumbotron text-center">

</section>

</div><!--div container-->
@stop
