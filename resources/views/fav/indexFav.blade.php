@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Welcome to indexFav page</h1>

	<ul>
		@foreach($favs as $fav)
		<li>#{{ $fav->name }}
		<form method="POST" action="{{ route('favs.destroy', ['fav' => $fav]) }}">
			@csrf
			@method('DELETE')
			<input type="submit" value="delete">
		</form>
		</li>
		@endforeach
	</ul>
</div>
@endsection
