@extends('layouts.app')

@section('content')
	<div class="wrapper banner">
		<div class="wrapper announcement full">
			@include('layout.announcement.partial.content', ['type'=>$announcement])
		</div>
	</div>
	<div class="modal image">
		<img src="" alt="No photo">
		<span><i class="fas fa-times"></i></span>
	</div>
@endsection