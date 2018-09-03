@extends('layouts.app')

@section('content')
    <div class="wrapper banner">
        <h1>Activities</h1>
    </div>
    @foreach($albumcovers as $albumcover)
            <div class="wrapper image">
                <a href="{{ route('album.show', $albumcover->id) }}">
                    <img src="{{ asset('albumcover/'.$albumcover->cover) }}">
                    <h1>{{ $albumcover->albumname }}</h1>
                </a>
            </div>
            @if(Auth::check() == true)
                @if(Auth::user()->username == 'osis')
                    <div class="form">
                        <form action="{{ route('activity.destroy', $albumcover->id) }}" method="POST">
                            <input type="submit" value="Delete">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>
                        <form action="{{ route('activity.update', $albumcover->id) }}" method="POST" enctype="multipart/form-data">
                            <input type="text" name="albumname" placeholder="Edit Description" value="{{ $albumcover->albumname }}">
                            Edit Album Cover: <input type="file" name="album" value="{{ $albumcover->cover }}">
                            <input type="hidden" name="_method" value="put">
                            <input type="submit" value="Edit">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endif
            @endif
        @endforeach
@endsection