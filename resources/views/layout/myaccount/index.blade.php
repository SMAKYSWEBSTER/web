@extends('layouts.app')

<link rel="stylesheet" href="{{ URL::to('/css/myaccount/index.css') }}" type="text/css">

@section('content')
	<div class="wrapper card">
		@if(Auth::check() == true)
			{!! Form::model(null, [
				'url' => route('myaccount.firstupdate', Auth::user()->id),
				'method' => 'PATCH',
				'class' => 'card-body wrapped-height',
				'enctype' => 'multipart/form-data',
			]) !!}
			<div class="content">
				<h1>My Account</h1>
				<img class="profile-img" src="{{ asset('/propic/'.Auth::user()->propic) }}" width="100" height="100">
				<h3 class="profile-name" >{{ Auth::user()->username }}</h3>
				<input class="get-preview" type="file" name="propic" accept="image/*" tabindex="-1">
			</div>
			<div class="action-bar">
				<input class="btn" type="submit" value="Upload">
				<button type="button" class="btn img">select an image</button>
			</div>
				{{ csrf_field() }}
			{!! Form::close() !!}
		@endif
	</div>
@endsection