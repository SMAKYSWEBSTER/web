@extends('layouts.app')

@section('content')
    @if(Auth::check() == true && Auth::user()->username == 'tatausaha')
        <form class="wrapper hero" action="{{ route('manage.index') }}" method="GET" id="back">
            <input class="btn" type="submit" value="BACK">
            {{ csrf_field() }}
        </form>

        @foreach($readeds as $readed)
            <div class="wrapper manage">
                <div class="profile-info">
                    <p class="publisher">Nama: {{ $readed->name }}</p>
                    <p class="date-created">{{ $readed->created_at }}</p>
                </div>
                <div class="details">
                    <p>Email: {{ $readed->email }}</p>
                    <p>No.Telp: {{ $readed->phone }}</p>
                    <p>Topik Yang Ditanya: {{ $readed->topic }}</p>
                </div>
                <div class="desc">
                    <p>{{ $readed->details }}</p>
                </div>
                <div class="action-bar">
                <form action="{{ route('manage.forcedelete', $readed->id) }}" method="POST" class='delete'>
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn" type="submit" value="Delete">
                    {{ csrf_field() }}
                </form>
                <form action="{{ route('manage.restore', $readed->id) }}" method="POST" class='view'>
                    <input class="btn" type="submit" value="Restore">
                    {{ csrf_field() }}
                </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="wrapper banner">
            <h1>Oops, you accessed this page directly, and there's no content for you to see here!</h1>
        </div>
    @endif
@endsection