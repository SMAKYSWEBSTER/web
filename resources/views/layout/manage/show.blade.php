@extends('layouts.app')

@section('content')
@if (Auth::check() == true && Auth::user()->username == 'tatausaha')
    <div class="wrapper manage">
        <div class="profile-info">
            <p class="publisher">Nama: {{ $manage->name }}</p>
            <p class="date-created">{{ $manage->created_at }}</p>
        </div>
        <div class="details">
            <p>Email: {{ $manage->email }}</p>
            <p>No.Telp: {{ $manage->phone }}</p>
            <p>Topik Yang Ditanya: {{ $manage->topic }}</p>
        </div>
        <div class="desc full">
            <p>{{ $manage->details }}</p>
        </div>
        <div class="action-bar">
            <form action="{{ route('manage.destroy', $manage->id) }}" method="POST" class='delete'>
                <input type="hidden" name="_method" value="delete">
                <input class="btn" type="submit" value="READED">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <form class="wrapper banner" action="{{ route('manage.index') }}" method="GET" class='back'>
        <input class="btn" type="submit" value="Back">
        {{ csrf_field() }}
    </form>
@else
    <div class="wrapper banner">
        <h1>Oops, you accessed this page directly, and there's no content for you to see here!</h1>
    </div>
@endif
@endsection