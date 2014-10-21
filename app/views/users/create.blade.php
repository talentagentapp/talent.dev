@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<h2>Setting Up Your Profile</h2>
		<hr>

		{{ Form::open(array('action' => 'UsersController@store', 'files' => true, 'class' => 'form-horizontal', 'id' => "contact-form")) }}

		<div class='form-group'>
			{{ Form::label('role', 'What is your Role in the entertainment industry:') }} <br>
			{{ Form::select('role', array('I am an Agent or Manager', 'I am the talent')) }}
		</div>

		<h3>Contact Information</h3>
		<div class='form-group'>
			{{ Form::label('first-name', 'First Name:', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::text('first-name', Input::old('first-name'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('last-name', 'Last Name:', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::text('last-name', Input::old('last-name'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'E-mail Address:', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		</div>	
		<hr>


		<h3>Profile Information</h3>
		<div class='form-group'>	
			{{ Form::label('user', 'Desired Username:', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::text('user', Input::old('user'), array('class' => 'form-control')) }}
		</div>	

		<div class="form-group">
			{{ Form::label('password1', 'Desired Password:', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::password('password1', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			<!-- TODO: add logic for password validation -->
			{{ Form::label('password2', 'Please Retype Your Password', array('class' => 'col-sm-0 control-label')) }}
			{{ Form::password('password2', array('class' => 'form-control')) }}
		</div>
		<hr>

		<h3>Personal Information </h3>
		<div class='form-group'>
			{{ Form::label('sex', 'Gender:', array('class' => 'col-sm-0 control')) }}
			<br>{{ Form::select('sex', array('Male', 'Female', 'Prefer to leave blank')) }}
		</div> 

		<div class='form-group'>
			{{ Form::label('dob', 'Please Enter Your Date Of Birth:', array('class' => 'col-sm-0 control')) }}
			{{-- Form::date('dob') --}}
			<br><input type='date' name='dob' class=''>
		</div>

		<div class="form-group">
			{{ Form::label('bio', 'Biography:') }}
			{{ Form::textarea('bio', '' , array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('img', 'Image:') }}
			{{ Form::file('img') }}
			<p class="help-block">This is optional.</p>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-0 col-sm-12">
				<button>Submit Form</button>
				{{-- Form::submit('Submit Form') --}}	
			</div>
		</div>

	</div>		

	{{ Form::close() }}

	@stop