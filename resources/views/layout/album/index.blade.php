@extends('layouts.app')

@section('content')

<div class="wrapper card">
        @foreach($albumcovers as $albumcover)
            @if(Auth::check() == true)
                @if(Auth::user()->username == 'osis')
                    {!! Form::open(['url'=>route('album.store'),'class'=>'card-body wrapped-height' , 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        <div class="content">
                            <input type="hidden" name="id" value="{{ $albumcover->id }}">
                            <input type="file" name="photos[]" tabindex="-1" accept="image/*" multiple>
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
        <div class="polaroid-img">
            <img src="{{ asset('/albumosis/small/'.$album->photos)}}">
        </div>
        @if(Auth::check() == true && Auth::user()->username == 'osis')
            {!! Form::open(['url'=>route('album.destroy', $album->id), 'method'=>'DELETE', 'enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="album_id" value="{{ $album->album_id }}">
                <input class="btn" type="submit" value="Delete">
                {{ csrf_field() }}
            {!! Form::close() !!}
        @endif
    @endforeach
</div>
<div class="modal image">
    <img src="none">
    <span><i class="fas fa-times"></i></span>
</div>
@endsection