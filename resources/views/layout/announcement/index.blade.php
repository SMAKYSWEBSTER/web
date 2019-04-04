@extends('layouts.app')

@section('content')
<div class="wrapper banner">

    @if(Auth::check() == true)
    <div class="wrapper card">
        <form class="action-bar" action="{{ route('announcement.deleted') }}" method="POST" id="viewdeleted">
            <input class="btn" type="submit" value="View Deleted">
            {{ csrf_field() }}
        </form>
        {!! Form::open(['url'=>route('announcement.store'), 'class'=>'card-body wrapped-height', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            <div class="content">
                <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                <input type="hidden" name="ann_id" value="{{ $ann_id }}">
                @foreach($users as $user)
                    <input type="hidden" name="propic" value="{{ $user->propic }}">
                @endforeach
                <h1>Create announcement</h1>
                {!! Form::cTextarea('description') !!}
                {!! Form::cInput('link') !!}
                <input type="file" name="file[]" multiple tabindex="-1">
            </div>
            {{-- <button type="button" class="btn img" tabindex="-1">select an image</button> --}}
            <div class="action-bar">
                <button type="button" class="btn file">select a file</button>
                <input class="btn" type="submit" value="Upload">
            </div>
            {{ csrf_field() }}
        {!! Form::close() !!}
    </div>
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
<div class="modal image">
    <img src="" alt="No photo">
    <span><i class="fas fa-times"></i></span>
</div>
@endsection