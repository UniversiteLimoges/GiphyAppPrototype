@extends('layouts.app')

@section('content')
<div class="container">
	<h1>hello test user</h1>

	<p>My name is {{ $name }}</p>

	<hr>

	<p>Liste des utilisateurs</p>

	<ul>
		@foreach ($users as $user)
			<li>{{ $user->name }}</li>
			<li>{{ $user->email }}</li>
			<li>
				<a href="/modifyTestForm/{{$user->id}}">Profile</a>
			</li>
		@endforeach
	</ul>
</div>
@endsection