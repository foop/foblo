@extends('layout')
@section('content')
	{{ Form::open(['url' => '/register']) }}
	{{ Form::text('user_name', null, ['placeholder' => 'username' ]) }}
	{{ Form::password('password', ['placeholder' => 'password' ]) }}
	{{ Form::password('password_confirmation', ['placeholder' => 'password' ]) }}
	<button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" >
		<span class="glyphicon glyphicon-heart-empty"></span> Log In
	</button>
	{{ Form::close() }}
@stop
