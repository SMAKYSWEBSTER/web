@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div class="wrapper banner">
		<h1>Continue To Vote Prom Queen</h1>
		<form action="{{ route('promnight.female') }}" method="GET">
		    <input type="submit" class="btn inverted rounded --color-primary" value="CONTINUE">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



