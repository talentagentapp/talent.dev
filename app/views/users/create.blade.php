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
			<h2>Setting Up Your Profile</h2>
			<hr>

			{{ Form::open(array('action' => 'UsersController@store', 'files' => true, 'class' => 'form-horizontal', 'id' => "contact-form")) }}


			<h3>Contact Information</h3>
			<div class='form-group'>
				{{ Form::label('first', 'First Name:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('first', Input::old('first'), array('class' => 'form-control')) }}
				@if ($errors->has('first')) <p class="help-block">{{ $errors->first('first') }}</p> @endif
			</div>

			<div class="form-group">
				{{ Form::label('last', 'Last Name:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('last', Input::old('last'), array('class' => 'form-control')) }}
				@if ($errors->has('last')) <p class="help-block">{{ $errors->first('last') }}</p> @endif

			</div>

			<div class="form-group">
				{{ Form::label('email', 'E-mail Address:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
				@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
			</div>	
			<hr>


			<h3>Profile Information</h3>
			<div class='form-group'>	
				{{ Form::label('username', 'Desired Username:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
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

			<div class='form-group'>
				{{ Form::label('talent', 'What is your Role in the entertainment industry:') }}<br>
				{{ Form::select('talent', array('0' => 'I am an Agent or Manager', '1' => 'I am the talent')) }}
				@if ($errors->has('talent')) <p class="help-block">{{ $errors->first('talent') }}</p> @endif
			</div>

			<div class='form-group'>
				{{ Form::label('dob', 'Please Enter Your Date Of Birth:', array('class' => 'col-sm-0 control')) }}
				{{-- Form::date('dob') --}}
				<br><input type='date' name='dob' class=''>
			</div>


			<div class="form-group">
				{{ Form::label('bio', 'Biography:') }}
				{{ Form::textarea('bio', '' , array('class' => 'form-control')) }}
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
				{{ Form::text('company', Input::old('company'), array('class' => 'form-control')) }}
			</div><br>

			<div class-"form-group">
				{{ Form::label('bio', 'Biography:') }}
				{{ Form::textarea('bio', '' , array('class' => 'form-control')) }}
				@if ($errors->has('bio')) <p class="help-block">{{ $errors->first('bio') }}</p> @endif
			</div><br>

			<div class="form-group">
				{{ Form::label('img', 'Please upload a profile photo') }}
				{{ Form::file('img') }}
				<p class="help-block">This step is optional.</p>
			</div>

			<div class="form-group">
				{{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	</div>
</div>			

{{ Form::close() }}

@stop