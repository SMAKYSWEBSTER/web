@extends('layouts.app')

@section('content')
<div class="wrapper banner">

    @if(Auth::check() == true)
        <form action="{{ route('announcement.deleted') }}" method="POST" id="viewdeleted">
            <input class="btn" type="submit" value="View Deleted">
            {{ csrf_field() }}
        </form>

        {!! Form::open(['url'=>route('announcement.store'), 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <input type="hidden" name="username" value="{{ Auth::user()->username }}"> 
            @foreach($users as $user)
            <input type="hidden" name="propic" value="{{ $user->propic }}">
            @endforeach
            {!! Form::cTextarea('description') !!}
            {!! Form::cInput('link') !!}
            <input type="file" name="file">
            {{-- <button type="button" class="btn img" tabindex="-1">select an image</button> --}}
            <input class="btn" type="submit" value="Upload">
            {{ csrf_field() }}
        {!! Form::close() !!}
    @endif

    @if(Auth::check() == true)
        @foreach($selfs as $self)
            <div class="wrapper announcement">
                @include('layout.announcement.partial.content', ['type'=>$self])
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
                @include('layout.announcement.partial.content', ['type'=>$general])
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