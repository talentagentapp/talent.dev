/vagrant/sites/talent.dev/app/views/users/index.blade.php
@extends('layouts.master')


@section('body')

	<div class="container">
		{{{ Form::open() }}}

		<div>
			{{ Form::label('Search', 'search') }}
		</div>	
		<div>
			{{ Form::text('search', Input::get('search')) }}
		</div>	


		{{{ Form::close() }}}
	</div>

    <!--Create logic below to iterate through individual user profiles-->

@stop