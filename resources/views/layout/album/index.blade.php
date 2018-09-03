@extends('layouts.app')

@section('content')
<div class="wrapper polaroid">
    @foreach($albums as $album)
        <div class="polaroid-img">
            <img src="{{ asset('/albumosis/'.$album->photos) }}">
        </div>
        @if(Auth::check() == true && Auth::user()->username == 'osis')
            <form action="{{ route('album.destroy', $album->id) }}" method="POST">
                <input type="hidden" name="album_id" value="{{ $album->album_id }}">
                <input type="hidden" name="_method" value="delete">
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