@extends('layouts.app')

@section('content')

<form class="wrapper banner" action="{{ route('activity.index') }}" method="GET" id="back">
    <input class="btn" type="submit" value="BACK">
    {{ csrf_field() }}
</form>

<div class="wrapper card">
    @foreach($albumcovers as $albumcover)
        @if(Auth::check() == true)
            @if(Auth::user()->username == 'osis')
                {!! Form::open(['url'=>route('album.store'),'class'=>'card-body wrapped-height' , 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                    <div class="content">
                        <input type="hidden" name="id" value="{{ $albumcover->id }}">
                        <input type="file" name="photos[]" tabindex="-1" accept="image/*" class="exception-input" multiple>
                        Total Photos: {{ $count }}
                        @if($errors->has('photos'))
                            <p> {{ $errors->first('photos') }} </p>
                        @endif
                    </div>
                    <div class="action-bar">
                        {{-- <button type="button" class="btn img">Upload Photos</button> --}}
                        <input class="btn" type="submit" value="Upload">
                    </div>
                    {{ csrf_field() }}
                {!! Form::close() !!}
            @endif
        @endif
    @endforeach
</div>

    <div class="wrapper polaroid">
        @foreach($albums as $album)
            <div identity="{{ $album->id }}">
                <div class="polaroid-img">
                    <img src="{{ asset('/albumosis/small/'.$album->photos)}}">
                </div>
                @if(Auth::check() == true && Auth::user()->username == 'osis')
                    <div class="action-bar">
                        {!! Form::open(['url'=>route('album.destroy', $album->id), 'method'=>'DELETE', 'enctype'=>'multipart/form-data']) !!}
                            <input type="hidden" name="album_id" value="{{ $album->album_id }}">
                            {{-- <input type="hidden" class="album_id" value="{{ $album->id }}"> --}}
                            <input class="btn" type="submit" id="destroy" data-url="{{ route('album.destroy', $album->id) }}" content="{{ csrf_token() }}" value="Delete">
                            {{ csrf_field() }}
                        {!! Form::close() !!}
                    </div>
                @endif        
            </div>
        @endforeach
    </div>

<div class="modal image">
    <img src="none">
    <span><i class="fas fa-times"></i></span>
</div>

@endsection