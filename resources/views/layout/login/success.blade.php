@extends('layouts.app')

@section('content')

<div class="wrapper card">
    <div class="card-body">
    @if(Auth::check() == true)
        <div class="content">
            <h1>You Are Logged In!</h1>
        </div>
        <form class="action-bar" action="/" method="GET">
            <input class="btn" type="submit" value="Bring Me To Home Page">
            {{ csrf_field() }}
        </form>
        @else
        <div class="content">
            <h1>Maybe Your Username/Password Is Incorrect!</h1>
        </div>
        <form class="action-bar" action="{{ URL::previous() }}" method="POST">
            <input class="btn" type="submit" value="Back">
            {{ csrf_field() }}
        </form>
    @endif
    </div>
</div>

@endsection