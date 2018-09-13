@extends('layouts.app')

@section('content')
  @if(Auth::check() == true && Auth::user()->username == 'osis')
    <div class="wrapper card">
      {!! Form::open(['url'=>route('achievement.update', $achievement->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data', 'class'=>'card-body']) !!}
        <div class="content">
          <h1>Edit Achievement</h1>
          {!! Form::cInput('title', $achievement->title) !!}
          {!! Form::cInput('name', $achievement->name) !!}
          {!! Form::cInput('rank', $achievement->rank) !!}
          {!! Form::cInput('date', $achievement->date) !!}
          <input class="get-preview" type="file" name="photo" value="{{ $achievement->photo }}" accept="image/*">
        </div>
        <input type="hidden" name="_method" value="patch">
        <div class="action-bar">
          <a class="btn" href="{{ route('achievement.index') }}">back</a>
          <input class="btn" type="submit" value="Edit" id="input">
          <button type="button" class="btn img" tabindex="-1">select an image</button>
        </div>
        {{ csrf_field() }}
      {!! Form::close() !!}
    </div>
  @else
  <div class="wrapper banner">
    <h1>Oops, you accessed this page directly, and there's no content for you to see here!</h1>
  </div>
  @endif
@endsection