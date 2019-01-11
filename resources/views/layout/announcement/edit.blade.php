@extends('layouts.app')

@section('content')
	<div class="wrapper card">
		<div class="content">
			@if(Auth::check() == true)
		        {!! Form::open(['url'=>route('announcement.update', $announcement->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
		            {!! Form::cTextarea('description', $announcement->description) !!}
		            {!! Form::cInput('link', $announcement->link) !!}
		            Change file: <input type="file" name="file">
		            <input type="submit" value="Upload"> 
		            {{ csrf_field() }}
		            <span id="btn"></span>
		        {!! Form::close() !!}
		    @endif	
		</div>
	</div>
@endsection