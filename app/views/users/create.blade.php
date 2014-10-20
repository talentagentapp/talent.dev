@extends('layouts.master')

@section('content')
<h2>Create Your Profile</h2>

{{ Form::open(array('action' => 'PostsController@store', 'files' => true, 'class' => 'form-horizontal', 'id' => "contact-form")) }}

<div class='form-group'>
	{{ Form::label('role', 'Your Role in the entertainment industry:') }}
	{{ Form::select('role', array('Talent Agent / Manager', 'Talent')) }}
</div>

<div class='form-group'>	
	{{ Form::label('user', 'Desired Username:', array('class' => 'cold-sm-0 control-label')) }}
	{{ Form::text('user', Input::old('user'), array('class' => 'form-control')) }}

	{{ Form::label('password', 'Desired Password:', array('class' => 'cold-sm-0 control-label')) }}
	{{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}
</div>

<div class='form-group'>
	<h3>Contact Information<h3>
	{{ Form::label('first-name', 'First Name:', array('class' => 'cold-sm-0 control-label')) }}
	{{ Form::text('first-name', Input::old('first-name'), array('class' => 'form-control')) }}

	{{ Form::label('last-name', 'Last Name:', array('class' => 'cold-sm-0 control-label')) }}
	{{ Form::text('last-name', Input::old('last-name'), array('class' => 'form-control')) }}

	{{ Form::label('email', 'E-mail Address:', array('class' => 'cold-sm-0 control-label')) }}
	{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
</div>

<div class='form-group'>
	{{ Form::select('Gender', array('Male', 'Female')) }}
</div>

<div class="form-group">
	<div class="col-sm-offset-0 col-sm-12">
		<button>Submit Form</button>
		{{-- Form::submit('Submit Form') --}}	
	</div>
</div>			

{{ Form::close() }}

@stop