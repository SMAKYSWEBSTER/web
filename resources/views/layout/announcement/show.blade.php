@extends('layouts.app')

@section('content')

	<div class="wrapper banner">
		<div class="wrapper announcement full">
			@include('layout.announcement.partial.content', ['type'=>$announcement])
		</div>
	</div>

@endsection