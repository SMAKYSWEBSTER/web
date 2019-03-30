@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div style="padding: 10rem; text-align: center;">
		Your Request Is Successfully Uploaded!
		<form action="{{ url()->previous() }}" method="GET">
		    <input type="submit" class="btn fixed inverted rounded --color-primary" value="Okay, Bring Me Back">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



