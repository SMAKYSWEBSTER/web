@extends('layouts.app')

@section('content')
<div class="wrapper banner">
  <h1>Achievements</h1>
</div>
<div class="wrapper card">
  @foreach($achievements as $achievement)
      <div class="card-body">
        <div class="card-img">
          <img src="achievements/{{ $achievement->photo }}" alt="No photo">
          <h2>{{ $achievement->title }}</h2>
        </div>
        <ul class="content">
          <li>{{ $achievement->name }}</li>
          <li>#{{ $achievement->rank }}</li>
          <li>{{ $achievement->date }}</li>
        </ul>
        @if(Auth::check() == true && Auth::user()->username == 'osis')
        <div class="action-bar">
            <a class="btn" href="{{ route('achievement.edit', $achievement->id) }}">Edit</a>
            <form action="{{ route('achievement.destroy', $achievement->id) }}" method="POST">
              <input class="btn" type="submit" value="Delete">
              <input type="hidden" name="_method" value="delete">
              {{ csrf_field() }}
            </form>
        </div>
        @endif
      </div>
  @endforeach
</div>
<div class="modal image">
  <img src="none" alt="No photo">
  <span><i class="fas fa-times"></i></span>
</div>
@endsection