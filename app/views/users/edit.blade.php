@extends('layouts.master')

@section('content')
<div class="container">
	@if ($errors->has())
	
	@foreach ($errors->all() as $error)
	{{ $error }}		
	@endforeach
	
	@endif
	<div class="row">
		<div class="col-md-12">
			<h2>Edit Your Profile</h2>
			<hr>

			{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'id' => "contact-form")) }}


			<h3>Contact Information</h3>
			<div class='form-group'>
				{{ Form::label('first', 'First Name:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('first', $user->first, array('class' => 'form-control')) }}
				@if ($errors->has('first')) <p class="help-block">{{ $errors->first('first') }}</p> @endif
			</div>

			<div class="form-group">
				{{ Form::label('last', 'Last Name:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('last', $user->last, array('class' => 'form-control')) }}
				@if ($errors->has('last')) <p class="help-block">{{ $errors->first('last') }}</p> @endif

			</div>

			<div class="form-group">
				{{ Form::label('email', 'E-mail Address:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('email', $user->email, array('class' => 'form-control')) }}
				@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
			</div>	
			<hr>


			<h3>Profile Information</h3>
			<div class='form-group'>	
				{{ Form::label('username', 'Desired Username:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('username', $user->username, array('class' => 'form-control')) }}
				@if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif

			</div>	

			<div class="form-group">
				{{ Form::label('password', 'Desired Password:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmed', 'Please Retype Your Password', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::password('password_confirmed', array('class' => 'form-control')) }}
			</div> 
			<hr>

			<h3>Personal Information </h3>
			<div class='form-group'>
				{{ Form::label('sex', 'Gender:', array('class' => 'col-sm-0 control')) }}
				<br>{{ Form::select('sex', array('m' => 'Male', 'f' =>'Female', 'not say' => 'Prefer to leave blank')) }}
			</div><br>


			<div class="form-group">
				{{ Form::label('experience', 'Please Enter Your Years of Experience in this field:') }}<br>
				{{ Form::select('experience', array('0-1' => '0-1 Years', '1-5' => '1-5 Years', '5-10' => '5-10 Years', '10+' => '10+ Years')) }}
				@if ($errors->has('experience')) <p class='help-block'>{{ $errors->first('experience') }}</p> @endif
			</div><br> 

			<div class="form-group">
				{{ Form::label('skills', 'What skills do you have pertaining to this field:', array('	class' => 'col-sm-0 control-label')) }}
				{{ Form::text('skills', $user->skills, array('class' => 'form-control')) }}
				@if ($errors->has('skills')) <p class="help-block">{{ $errors->first('skills') }}</p> @endif
			</div><br>

			<div class='form-group'>
				{{ Form::label('talent', 'What is your Role in the entertainment industry:') }}<br>
				{{ Form::select('talent', array('0' => 'I am an Agent or Manager', '1' => 'I am the talent')) }}
				@if ($errors->has('talent')) <p class="help-block">{{ $errors->first('talent') }}</p> @endif
			</div>

			<div class='form-group'>
				{{ Form::label('dob', 'Please Enter Your Date Of Birth:', array('class' => 'col-sm-0 control')) }}
				<br><input type='date' name='dob' id='dob' class=''>
			</div>


			<div class="form-group">
				{{ Form::label('bio', 'Biography:') }}
				{{ Form::textarea('bio', $user->bio, array('class' => 'form-control')) }}
				@if ($errors->has('bio')) <p class="help-block">{{ $errors->first('bio') }}</p> @endif
			</div><br>

			<div class="form-group">
				{{ Form::label('img', 'Please upload a profile photo') }}
				{{ Form::file('img') }}
				<p class="help-block">This step is optional.</p>
			</div>
			<hr>

			<!-- agent options -->
			<div class-"form-group">
				{{ Form::label('company', 'What agency do you work with? :') }}
				{{ Form::text('company', $user->company, array('class' => 'form-control')) }}
			</div><br>

			<div class-"form-group">
				{{ Form::label('bio', 'Biography:') }}
				{{ Form::textarea('bio', $user->bio, array('class' => 'form-control')) }}
				@if ($errors->has('bio')) <p class="help-block">{{ $errors->first('bio') }}</p> @endif
			</div><br>

			<div class="form-group">
				{{ Form::label('img', 'Please upload a profile photo') }}
				{{ Form::file('img') }}
				<p class="help-block">This step is optional.</p>
			</div>

			<div class="form-group">
				{{ Form::submit('Update Account', ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	</div>
</div>			

{{ Form::close() }}

@stop