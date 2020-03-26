@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Welcome to indexFav page</h1>

	<ul>
		@foreach($favs as $fav)
		<li>#{{ $fav->name }}</li>
		@endforeach
	</ul>
</div>
@endsection
