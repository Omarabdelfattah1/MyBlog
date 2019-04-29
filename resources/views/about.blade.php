@extends('layouts.app')


@section('content')

<h1>{{$title}}</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


@endsection
@section('sidebar')
@parent
    <h3>Sidebar</h3>
    <p>this is sidebar</p>

	<p>this is append to sidebar</p>


@endsection