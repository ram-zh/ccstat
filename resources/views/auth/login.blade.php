@extends('layout')
@section('content')
	<form action="{{ url('login') }}" method="post">
		{{ csrf_field() }}
		Email or domain login: <input type="text" name="login"/><br/>
		Password: <input type="password" name="password"/><br/>
		<input type="submit"/>
	</form>
@endsection