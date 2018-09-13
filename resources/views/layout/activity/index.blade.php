@extends('layouts.app')

@section('content')
    <div class="wrapper banner">
        <h1>Activities</h1>
    </div>

    @if(Auth::check() == true) 
        @if(Auth::user()->username == 'osis')
            <div class="wrapper card">
                <div class="content">
                    {!! Form::open(['url'=>route('activity.store'), 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        {!! Form::cInput('albumname') !!}
                        Upload Album Cover: <input type="file" name="album">
                        <input type="submit" value="Upload">
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
    @endif

    @foreach($albumcovers as $albumcover)
            <div class="wrapper image">
                <a href="{{ route('album.show', $albumcover->id) }}">
                    <img src="{{ asset('albumcover/'.$albumcover->cover) }}">
                    <h1>{{ $albumcover->albumname }}</h1>
                </a>
            </div>
            @if(Auth::check() == true)
                @if(Auth::user()->username == 'osis')
                    <div style="text-align: center;">
                        {!! Form::open(['url'=>route('activity.destroy', $albumcover->id), 'method'=>'DELETE', 'enctype'=>'multipart/form-data']) !!}
                            <input type="submit" value="Delete">
                            {{ csrf_field() }}
                        {!! Form::close() !!}
                        
                        {!! Form::open(['url'=>route('activity.update', $albumcover->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                                <input type="text" name="albumname" placeholder="Edit Description" value="{{ $albumcover->albumname }}">
                                Edit Album Cover: <input type="file" name="album" value="{{ $albumcover->cover }}">
                                <input type="submit" value="Edit">
                            {{ csrf_field() }}
                        {!! Form::close() !!}
                    </div>
                @endif
            @endif
        @endforeach
@endsection