@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div style="padding: 10rem;">
		Your Request Is Successfully Uploaded!
		<form action="{{ url()->previous() }}" method="GET">
		    <input type="submit" value="Okay, Bring Me Back">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



