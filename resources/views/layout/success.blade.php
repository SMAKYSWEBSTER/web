@extends('core.navbar')

<link rel="stylesheet" type="text/css" href="css/success.css">

@section('content')

<div id="info">Your Request Is Successfully Uploaded!</div>

  <form action="{{ url()->previous() }}" method="GET">
    <input type="submit" value="Okay, Bring Me Back">
    {{ csrf_field() }}
  </form>
@endsection



