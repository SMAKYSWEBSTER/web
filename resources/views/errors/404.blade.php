@extends('layouts.app')

@section('content')
    <div class="wrapper banner">
        <h1>404 Error!</h1>
        <h1>Page not found</h1>
        <a href="{{ route('layout.home') }}" class="btn">Back to homepage</a>
    </div>
@endsection