@extends('layout')
@section('content')
	<h1>Contact me</h1>
	<p>Please contact us by sending a message using the form below:</p>
	<div class="form-group">
	{{ Form::open(array('url' => 'contact' )) }}
	{{ Form::label('Subject') }}
	{{ Form::text('subject', 'Enter your subject', array('type' => 'text', 'class' => 'form-control')) }}
	<br />
	{{ Form::label('Message') }}
	{{ Form::textarea('message', 'Enter your message', array('class' => 'form-control', 'rows' => '3')) }}
	<br />
	<button class="btn btn-primary" type="submit" value="Submit" >
		<span class="glyphicon glyphicon-send"></span> Send
	</button>
	{{ Form::close() }}
	</div> <!--div form group-->
@stop
