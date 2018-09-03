@extends('layouts.app')

@section('content')
<div class="wrapper card">
    <div class="alert ">Your Request Is Successfully Uploaded!</div>

    <form class="action-bar" action="{{ url()->previous() }}" method="GET">
        <input class="btn" type="submit" value="Okay, Bring Me Back">
        {{ csrf_field() }}
    </form>
</div>
@endsection