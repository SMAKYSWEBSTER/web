@extends('layouts.app')

@section('content')
<div class="wrapper banner">
    @if (Auth::check() == true)
        @foreach($selfs as $self)
            <div class="wrapper announcement">
                <div class="profile-info">
                    <img src="propic/{{ $self->propic }}" width="100px" height="100px">
                    <p class="publisher"> Publisher: {{ $self->username }} </p>
                    <p class="date-created"> {{ $self->created_at }} </p>
                </div>
                <div class="desc">
                    <p> {{ $self->description }} </p>
                    <a href="{{ asset("/file/".$self->files) }}" download >{{ $self->files }}</a>
                    <a href="{{ $self->link }}">{{ $self->link }}</a>
                </div>
                <div class="action-bar">
                    <form action="{{ route('announcement.destroy', $self->id) }}" method="POST" class='delete'>
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn" type="submit" value="Delete">
                        {{ csrf_field() }}
                    </form>
                    <form action="{{ route('announcement.edit', $self->id) }}" method="GET" class='edit'>
                        <input class="btn" type="submit" value="Edit">
                        {{ csrf_field() }}
                    </form>
                    <form action="{{ route('announcement.show', $self->id) }}" method="GET">
                        <input class="btn" type="submit" value="View More">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endforeach
    @else
        @foreach ($generals as $general)
            <div class="wrapper announcement">
                <div class="profile-info">
                    <img src="propic/{{ $general->propic }}" width="100px" height="100px">
                    <p class="publisher"> Publisher: {{ $general->username }} </p>
                    <p class="date-created"> {{ $general->created_at }} </p>
                </div>
                <div class="desc">
                    <p> {{ $general->description }} </p>
                    <a href="{{ asset("/file/".$general->files) }}" download >{{ $general->files }}</a>
                    <a href="{{ $general->link }}">{{ $general->link }}</a>
                </div>
                <div class="action-bar">
                    <form action="{{ route('announcement.show', $general->id) }}" method="GET">
                        <input class="btn" type="submit" value="View More">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection