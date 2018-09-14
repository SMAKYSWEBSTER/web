@extends('layouts.app')

@section('content')

	<div class="wrapper banner full">
		<div class="wrapper announcement">
			@include('layout.announcement.partial.content', ['type'=>$announcement])
		</div>
	</div>

@endsection