@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Edit page {{ $current_user->name }}</h1>

    <form method="POST" action="{{ route('user.update', ['user' => $current_user]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Enter your e-mail" value="{{ $current_user->email }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name"
                value="{{ $current_user->name }}">
        </div>
        
        {{ Form::hidden('ip', $location['ip']) }}
        {{ Form::hidden('iso_code', $location['iso_code']) }}
        {{ Form::hidden('country', $location['country']) }}
        {{ Form::hidden('city', $location['city']) }}
        {{ Form::hidden('state', $location['state']) }}
        {{ Form::hidden('state_name', $location['state_name']) }}
        {{ Form::hidden('postal_code', $location['postal_code']) }}
        {{ Form::hidden('lat', $location['lat']) }}
        {{ Form::hidden('lon', $location['lon']) }}
        {{ Form::hidden('timezone', $location['timezone']) }}
        {{ Form::hidden('continent', $location['continent']) }}
        {{ Form::hidden('currency', $location['currency']) }}

        <button type="submit" class="btn btn-primary"> Go </button>
    </form>
</div>

<pre>
@php
    echo var_dump($location);
@endphp
</pre>

@endsection
