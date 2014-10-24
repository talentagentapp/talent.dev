@extends('layouts.master')

@section('title', 'User Show')

@section('content')
<div class='container' style="border: 2px solid white;">
	<div class='row'>
		<div class='col-md-8'>
			<h1>{{{ $user->first . ' ' . $user->last }}}</h1>
			<img src="{{ $user->img }}">
			<h4><a href="mailto:{{{ $user->email }}}">{{{ $user->email }}}</a></h4>
			<p>{{{ $user->bio }}}</p>
		</div>
		<div class='col-md-4'>
			<h3>Additional Profile Information</h3>
			<hr>
			<p>{{{ $user->skills }}}</p>
			<p>I have {{{ $user->experience }}} years of experience.</p>
			<!-- <p>{{{ $user->sex }}}</p> -->
			<p>Ect.</p>
		</div>
	</div>
</div>
@stop