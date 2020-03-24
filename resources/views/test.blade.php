@extends('layouts.app')

@section('content')
	<h1>hello test user</h1>
	
	<p>My name is {{ $name }}</p>

	<hr>

	<p>Liste des utilisateurs</p>

	<ul>
		@foreach ($names as $name)
			<li>{{ $name }}</li>
		@endforeach
	</ul>



@endsection