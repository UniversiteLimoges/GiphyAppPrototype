@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Welcome to addFormFav page</h1>
	<p>Input new favorit tag to display it in application</p>

	<hr>

	<form method="POST" action="/favs">
		@csrf
		<label for="tag-name">New Tag</label>
		<input id="tag-name" type="text" name="tag-name">
		<input type="submit" value="add">
	</form>
</div>
@endsection