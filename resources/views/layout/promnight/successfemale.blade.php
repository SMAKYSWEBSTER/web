@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div class="wrapper banner">
		<h1>Thanks For Your Vote!</h1>
		<form action="https://www.google.com/" method="GET">
		    <input type="submit" class="btn inverted rounded --color-primary" value="TAKE ME OUT!">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



