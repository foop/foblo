@extends('layout')
@section('content')
	@if ( Auth::check() )
		{{ Form::open(array('url' => array('user/edit', $user->id))) }}
		{{ Form::text('username', $user->user_name ) }}
		{{ Form::password('old password', ['placeholder' => 'old password']) }}
		{{ Form::password('new password', ['placeholder' => 'new password']) }}
		{{ Form::password('new password', ['placeholder' => 'new password confirmation']) }}
		{{ Form::close() }}
	@else <h1> You should not see this message, go away </h1>
	@endif

@stop
