@extends('layouts.master')

@section('content')
<div class="row">
<h2>Setting Up Your Profile</h2>
<hr>

{{ Form::open(array('action' => 'UsersController@store', 'files' => true, 'class' => 'form-horizontal', 'id' => "contact-form")) }}

<div class='form-group'>
	{{ Form::label('role', 'What is your Role in the entertainment industry:') }} <br>
	{{ Form::select('role', array('I am a talent Agent or Manager', 'I am the talent')) }}
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

<h3>Profile Information</h3>
<div class='form-group'>	
	{{ Form::label('user', 'Desired Username:', array('class' => 'col-sm-0 control-label')) }}
	{{ Form::text('user', Input::old('user'), array('class' => 'form-control')) }}
</div>	

<div class="form-group">
 	<h3>Desired Password :</h3>
    {{ Form::password('password', array('class' => 'form-control', 'value' => Input::old('password'))) }}
</div>

<div class="form-group">
	<h3>Please Retype Your Password</h3>
	{{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
</div>


<h3>Gender :</h3>
<div class='form-group'>
	{{ Form::select('Gender', array('Male', 'Female')) }}
</div> <br>

<div class="form-group">
	<div class="col-sm-offset-0 col-sm-12">
		<button>Submit Form</button>
		{{-- Form::submit('Submit Form') --}}	
	</div>
</div>	
</div>		

{{ Form::close() }}

@stop