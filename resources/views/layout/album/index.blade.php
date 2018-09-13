@extends('layouts.app')

@section('content')

<div class="wrapper card">
    <div class="content">
        @foreach($albumcovers as $albumcover)
            @if(Auth::check() == true) 
                @if(Auth::user()->username == 'osis')
                    {!! Form::open(['url'=>route('album.store'), 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="id" value="{{ $albumcover->id }}">
                        <input type="file" name="photos[]" multiple>
                        @if($errors->has('photos'))
                            <p> {{ $errors->first('photos') }} </p>
                        @endif
                        <input type="submit" value="Upload">
                        {{ csrf_field() }}
                    {!! Form::close() !!}
                    Total Photos: {{ $count }}                        
                @endif
            @endif
        @endforeach            
    </div>
</div>
<div class="wrapper polaroid">
    @foreach($albums as $album)
        <div class="polaroid-img">
            <img src="{{ asset('/albumosis/'.$album->photos) }}">
        </div>
        @if(Auth::check() == true && Auth::user()->username == 'osis')
            {!! Form::open(['url'=>route('album.destroy', $album->id), 'method'=>'DELETE', 'enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="album_id" value="{{ $album->album_id }}">
                <input class="btn" type="submit" value="Delete">
                {{ csrf_field() }}
            </form>
        @endif
    @endforeach
</div>
<div class="modal image">
    <img src="none">
    <span><i class="fas fa-times"></i></span>
</div>
@endsection