@extends('layouts.app')

<link rel="stylesheet" href="{{ URL::to('/css/myaccount/index.css') }}" type="text/css">

@section('content')
	<div class="wrapper card">
		@if(Auth::check() == true)
			{!! Form::model(null, [
				'url' => route('myaccount.firstupdate', Auth::user()->id),
				'method' => 'PATCH',
				'class' => 'card-body',
				'enctype' => 'multipart/form-data',
			]) !!}
			<div class="content">
				<input class="get-preview" type="file" name="propic" accept="image/*">
				<label class="inp">
					<input type="text" class="image-upload-input" placeholder="&nbsp;">
					<span class="label">Update Profile Picture</span>
					<span class="border"></span>
				</label>
			</div>
			<div class="action-bar">
				<input type="submit" value="Upload">
				<button type="button" class="btn img" tabindex="-1">select an image</button>
			</div>
				{{ csrf_field() }}
			{!! Form::close() !!}
		@endif
	</div>
@endsection