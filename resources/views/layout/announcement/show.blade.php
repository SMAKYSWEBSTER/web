@extends('layouts.app')

@section('content')

	<div class="wrapper banner">
		<div class="wrapper announcement">
			@include('layout.announcement.partial.content', ['type'=>$announcement])
		</div>
	</div>

@endsection