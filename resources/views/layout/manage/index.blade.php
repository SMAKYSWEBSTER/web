@extends('layouts.app')

@section('content')
    @if(Auth::check() == true && Auth::user()->username == 'tatausaha')
        <form class="wrapper hero" action="{{ route('manage.readed') }}" method="POST">
            <input class="btn" type="submit" value="VIEW READ">
            {{ csrf_field() }}
        </form>

        @foreach($contact_us as $contactus)
            <div class="wrapper manage">
                <div class="profile-info">
                    <p class="publisher">Nama: {{ $contactus->name }}</p>
                    <p class="date-created">{{ $contactus->created_at }}</p>
                </div>
                <div class="details">
                    <p>Email: {{ $contactus->email }}</p>
                    <p>No.Telp: {{ $contactus->phone }}</p>
                    <p>Topik Yang Ditanya: {{ $contactus->topic }}</p>
                </div>
                <div class="desc">
                    <p>{{ $contactus->details }}</p>
                </div>
                <div class="action-bar">
                    <form action="{{ route('manage.show', $contactus->id) }}" method="GET" class='view'>
                    <input class="btn" type="submit" value="View More">
                    {{ csrf_field() }}
                    </form>
                    <form action="{{ route('manage.destroy', $contactus->id) }}" method="POST" class='delete'>
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn" type="submit" value="Read">
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