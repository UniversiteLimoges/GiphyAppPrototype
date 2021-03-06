@extends('layouts.app')

@section('content')
<div class="container">
    <h1> Welcome {{ $current_user->name }}</h1>
    @include('flash-message')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                <li>{{ $current_user->name }}</li>
                <li>{{ $current_user->email }}</li>
                <li>{{ $current_user->visitor_ip }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection