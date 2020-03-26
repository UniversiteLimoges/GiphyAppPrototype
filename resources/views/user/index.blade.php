@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1> Welcome {{ $current_user->name }}</h1>
        <div class="col-md-8">

            <ul>
                <li>{{ $current_user->name }}</li>
                <li>{{ $current_user->email }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection