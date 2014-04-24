@extends('layout')
@section('content')

<h1>Log in</h1>
<div class="container login jumbotron" >
{{ Form::open(array('url' => 'flogin', 'class' => 'form-signin', 'role'=> 'form') ) }}
<h2 class="form-signin-heading">Please sign in</h2>
{{ Form::label('Username') }}
{{ Form::text('username', 'st.franz_von_gnustein', array('class' => 'form-control', 'autofocus' => 'autofocus', 'autocomplete' => 'on' ) ) }}
{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password' ) ) }}
{{ Form::checkbox('remberme', 'chosen') }} {{ Form::label('Remember me') }}

<br />
	<button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" >
		<span class="glyphicon glyphicon-heart-empty"></span> Log In
	</button>

</div>
{{ Form::close() }}

@stop
