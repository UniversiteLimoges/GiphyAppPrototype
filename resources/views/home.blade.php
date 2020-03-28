@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center"> Welcome {{ $current_user->name }}</h1>
    <div class="row justify-content-center">
        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="card-footer">
                    <p> Please update your profile before use Giphy ! </p>
                        <a href="{{ route('user.edit', ['user' => $current_user]) }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Go to Profile</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
