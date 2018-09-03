@extends('layouts.app')

@section('content')
  @if(Auth::check() == true && Auth::user()->username == 'osis')
    <div class="wrapper card">
      <form class="card-body" action="{{ route('achievement.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        <div class="content">
          <h1>Edit Achievement</h1>
          <label class="inp">
            <input type="text" name="title" placeholder="&nbsp;" value="{{ $achievement->title }}">
            <span class="label">Edit Title</span>
            <span class="border"></span>
          </label>
          <label class="inp">
            <input type="text" name="name" placeholder="&nbsp;" value="{{ $achievement->name }}">
            <span class="label">Edit Name</span>
            <span class="border"></span>
          </label>
          <label class="inp">
            <input type="text" name="rank" placeholder="&nbsp;" value="{{ $achievement->rank }}">
            <span class="label">Edit Rank</span>
            <span class="border"></span>
          </label>
          <label class="inp">
            <input type="text" name="date" placeholder="&nbsp;" value="{{ $achievement->date }}">
            <span class="label">Edit Date</span>
            <span class="border"></span>
          </label>
          <input class="get-preview" type="file" name="photo" value="{{ $achievement->photo }}" accept="image/*">
          <label class="inp">
            <input type="text" class="image-upload-input" placeholder="&nbsp;">
            <span class="label">Edit Photo</span>
            <span class="border"></span>
          </label>
        </div>
        <input type="hidden" name="_method" value="patch">
        <div class="action-bar">
          <a class="btn" href="{{ route('achievement.index') }}">back</a>
          <input class="btn" type="submit" value="Edit" id="input">
          <button type="button" class="btn img" tabindex="-1">select an image</button>
        </div>
        {{-- <div class="img-preview">
          <img src="preview" alt="No Photo Uploaded">
        </div> --}}
        {{ csrf_field() }}
      </form>
    </div>
  @else
  <div class="wrapper banner">
    <h1>Oops, you accessed this page directly, and there's no content for you to see here!</h1>
  </div>
  @endif
@endsection