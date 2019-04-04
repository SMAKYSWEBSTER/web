@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div style="padding: 10rem; text-align: center;">
		Continue To Vote Prom Queen
		<form action="{{ route('promnight.female') }}" method="GET">
		    <input type="submit" class="btn fixed inverted rounded --color-primary" value="CONTINUE">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



