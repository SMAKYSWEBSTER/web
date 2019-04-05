@extends('layouts.app')

@section('content')
    <div class="wrapper banner">
        <h1>Activities</h1>

        @if(Auth::check() == true)
            @if(Auth::user()->username == 'osis')
                <div class="wrapper card">
                    {!! Form::open(['url'=>route('activity.store'), 'class'=>'card-body wrapped-height', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        <div class="content">
                            {!! Form::cInput('albumname') !!}
                            <input type="file" name="album" accept='image/*'>
                        </div>
                        <div class="action-bar">
                            <button type="button" class="btn img" tabindex="-1">select an album cover</button>
                            <input class="btn" type="submit" value="Upload">
                        </div>
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif
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
                    {!! Form::open(['url'=>route('activity.destroy', $albumcover->id), 'class'=>'action-bar', 'method'=>'DELETE', 'enctype'=>'multipart/form-data'])!!}
                        <input class="btn" type="submit" value="Delete">
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>route('activity.update', $albumcover->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                        <div class="bottom-bar">
                            {!! Form::cInput('albumname') !!}
                            {{-- <input type="text" name="albumname" placeholder="Edit Description" value="{{ $albumcover->albumname }}"> --}}
                            <input type="file" name="album" value="{{ $albumcover->cover }}" accept="image/*" tabindex="-1">
                        </div>
                        <div class="action-bar">
                            <button type="button" class="btn img">edit album cover</button>
                            <input class="btn" type="submit" value="Edit">
                        </div>
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                @endif
            @endif
        @endforeach
@endsection