@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header d-flex">
            {{ __('Dashboard') }}
            <div class="ml-auto">
                <a href="home">Home</a>|
                <a href="{{ route('sons.index') }}">Sons</a>|
                <a href="grandsons">Grandsons</a>
                <a href="{{ route('posts.index') }}">Posts</a>
            </div>

        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>

@endsection
