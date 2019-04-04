@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

	<div style="padding: 10rem; text-align: center;">
		Thanks For Your Vote!
		<form action="https://www.google.com/" method="GET">
		    <input type="submit" class="btn fixed inverted rounded --color-primary" value="TAKE ME OUT!">
		    {{ csrf_field() }}
		</form>
	</div>

@endsection



