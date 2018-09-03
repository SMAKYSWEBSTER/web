@extends('layouts.app')

@section('content')
	<div class="banner-wrapper">
		@foreach($deleteds as $deleted)
			<div class="announcement-wrapper">
				@include('layout.announcement.partial.content',['type'=>$deleted])
		        <div class="action-bar">
                    <form action="{{ route('announcement.restore', $deleted->id) }}" method="POST" class='delete'>
                        <input class="btn" type="submit" value="Restore">
                        {{ csrf_field() }}
                    </form>
                    <form action="{{ route('announcement.forcedelete', $deleted->id) }}" method="POST" class='edit'>
                    	<input type="hidden" name="_method" value="delete">
                        <input class="btn" type="submit" value="Delete">
                        {{ csrf_field() }}
                    </form>
                </div>
		    </div>
	    @endforeach
	</div>
@endsection

<link rel="stylesheet" href="{{ asset('css/announcement/index.css') }}">