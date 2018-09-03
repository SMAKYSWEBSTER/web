@extends('layouts.app')

@section('content')
{{-- <div class="banner-wrapper">
    <button class="btn">Edit or Delete</button>
</div> --}}
<div class="wrapper card">
    @foreach($facilities as $facility)
        <div class="card-body facility">
            <div class="card-img">
                <img src="fasilitas/{{ $facility->photo }}">
            </div>
            <h1>{{ $facility->desc }}</h1>
            @if(Auth::check() == true && Auth::user()->username == 'osis')
            <div class="action-bar">
                <form action="{{ route('facility.destroy', $facility->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn" type="submit" value="Delete">
                    {{ csrf_field() }}
                </form>
                <form action="{{ route('facility.edit', $facility->id) }}" method="GET">
                    <input class="btn" type="submit" value="Edit">
                    {{ csrf_field() }}
                </form>
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
