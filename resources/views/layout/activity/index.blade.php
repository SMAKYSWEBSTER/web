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
                            <input class="exception-input" type="file" name="album" tabindex="-1" accept="image/*">
                            @if($errors->has('album'))
                                <p> {{ $errors->first('album') }} </p>
                            @endif
                        </div>
                        <div class="action-bar">
                           {{--  <button type="button" class="btn img">select an album cover</button> --}}
                            <input class="btn" type="submit" value="Upload">
                        </div>
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif
    </div>

    @foreach($albumcovers as $albumcover)
        <div identity="{{ $albumcover->id }}">
            <div class="wrapper image">
                <a href="{{ route('album.show', $albumcover->id) }}">
                    <img src="{{ asset('albumcover/'.$albumcover->cover) }}">
                    <h1>{{ $albumcover->albumname }}</h1>
                </a>
            </div>
            @if(Auth::check() == true)
                @if(Auth::user()->username == 'osis')
                    <div class="action-bar">
                        {!! Form::open(['url'=>route('activity.destroy', $albumcover->id), 'method'=>'DELETE', 'enctype'=>'multipart/form-data'])!!}
                            <input class="btn" type="submit" id="destroy" data-url="{{ route('activity.destroy', $albumcover->id) }}" content="{{ csrf_token() }}" value="Delete">
                            {{ csrf_field() }}
                        {!! Form::close() !!}
                        {!! Form::open(['url'=>route('activity.update', $albumcover->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                            {!! Form::cInput('albumname', $albumcover->albumname) !!}
                            {{-- <input type="text" name="albumname" placeholder="Edit Description" value="{{ $albumcover->albumname }}"> --}}
                            {{-- <input type="file" name="album" value="{{ $albumcover->cover }}" accept="image/*" tabindex="-1"> --}}
                            <input class="exception-input" type="file" name="album" value="{{ $albumcover->cover }}">
                            {{-- <button type="button" class="btn img exception-button">edit album cover</button> --}}
                            <input class="btn" type="submit" value="Edit">
                            {{ csrf_field() }}
                        {!! Form::close() !!}
                    </div>
                @endif
            @endif
        </div>
    @endforeach
@endsection