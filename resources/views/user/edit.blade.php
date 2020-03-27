@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Welcome to Edit page {{ $current_user->name }}</h1>

	<form method="POST" action="{{ route('user.update', ['user' => $current_user]) }}">
		@csrf
		@method('PUT')
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ $current_user->email }}">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="name">Name</label>
	    <input type="text" class="form-control" id="name" placeholder="{{ $current_user->name }}">
	  </div>
	  <button type="submit" class="btn btn-primary"> Go </button>
	</form>
</div>

<pre>
@php
	echo var_dump($location);
@endphp
</pre>

@endsection