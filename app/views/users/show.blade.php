/vagrant/sites/talent.dev/app/views/users/show.blade.php

@extends('layouts.master')

@section('body')

	<article>
		<h1>{{{ $profile->username }}}</h1>
		<p>{{{ $user->bio }}}</p>
	</article>

@stop

@section('footer')

@stop