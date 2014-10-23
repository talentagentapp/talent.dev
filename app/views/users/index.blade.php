@extends('layouts.master')

@section('title', 'Users Index')

@section('body')
<div class="container">
	<div class='row'>
		<div class='col-md-12'>
			@forelse($users as $user)
			<h3>{{{ $user->first . ' ' . $user->last }}}</h3>

			<h6>{{{ $user->skills }}}</h6>
			@empty
			<p>No mo' users.</p>
			@endforelse
		</div>
	</div>
</div>
@stop