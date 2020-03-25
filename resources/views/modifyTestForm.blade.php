@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{ $user_to_modify->name }} profile</h1>

	<p>Modify Informations</p>

	<form method="POST" action="/applyModify/{{$user_to_modify->id}}">
		@csrf
		<label for="name">New name</label>
		<input id="name" type="text" name="name">
		<input type="submit" value="Modify">
	</form>

	<hr>
</div>
@endsection