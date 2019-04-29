@extends('layouts.app')


@section('content')


<h1>{{$title}}</h1>
<?php
  if (count($contacts)>0) {
  	echo "<ul>";
  	foreach ($contacts as $contact) {
  		echo"<li>$contact</li>";
  	}
  	echo "</ul>";
  }

?>

@endsection
@section('sidebar')
@parent
    <h3>Sidebar</h3>
    <p>this is sidebar</p>

	<p>this is append to sidebar</p>


@endsection