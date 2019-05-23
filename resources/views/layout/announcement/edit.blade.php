@extends('layouts.app')

@section('content')
	<div class="wrapper card">
		<div class="content">
			@if(Auth::check() == true)
		        {!! Form::open(['url'=>route('announcement.update', $announcement->id), 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
		        	{!! Form::cInput('title', $announcement->title) !!}
		        	@foreach($announcement->descs as $desc)
		            	{!! Form::cTextarea('description', $desc->description) !!}
		            @endforeach
		            {!! Form::cInput('link', $announcement->link) !!}
		            <br>
		            <input type="submit" value="Upload"> 
		            {{ csrf_field() }}
		            <span id="btn"></span>
		        {!! Form::close() !!}

		        @foreach($announcement->files as $file)
	            	{!! Form::open(['url'=>route('announcement.updatefile', $file->id), 'method'=>'put', 'enctype'=>'multipart/form-data']) !!}
	            		<input name="_method" type="hidden" value="PATCH">
		            	<p>{{ $file->file }}</p>
			            Change file: <input type="file" name="file">
			            <input type="submit" value="Change">
			            {{ csrf_field() }}
		            {!! Form::close() !!}
	            @endforeach
		    @endif	
		</div>
	</div>
@endsection