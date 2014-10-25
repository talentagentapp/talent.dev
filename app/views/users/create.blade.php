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
                @if($errors->has('first')) <div class="alert alert-danger" role="alert">{{ $errors->first('first') }}</div> @endif
			</div>

			<div class="form-group">
				{{ Form::label('last', 'Last Name:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('last', Input::old('last'), array('class' => 'form-control')) }}
                @if($errors->has('last')) <div class="alert alert-danger" role="alert">{{ $errors->first('last') }}</div> @endif

			</div>

			<div class="form-group">
				{{ Form::label('email', 'E-mail Address:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                @if($errors->has('email')) <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div> @endif
			</div>	
			<hr>


			<h3>Profile Information</h3>
			<div class='form-group'>	
				{{ Form::label('username', 'Desired Username:', array('class' => 'col-sm-0 control-label')) }}
				{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
				<p class="help-block">Please make sure your username is between 5 and 25 characters long and only contains
					numbers, letters, dashes and underscores.</p>
                @if($errors->has('username')) <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div> @endif
				</div>	

				<div class="form-group">
					{{ Form::label('password', 'Desired Password:', array('class' => 'col-sm-0 control-label')) }}
					{{ Form::password('password', array('class' => 'form-control')) }}
					<p class="help-block">Please make sure your password is at least 5 characters long.</p>
	                @if($errors->has('password')) <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div> @endif
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
                @if($errors->has('experience')) <div class="alert alert-danger" role="alert">{{ $errors->first('experience') }}</div> @endif
				</div><br>

				<div class='form-group'>
					{{ Form::label('skills', 'What skills do you have pertaining to this field:', array('class' => 'col-sm-0 control-label')) }}
					{{ Form::text('skills', Input::old('first'), array('class' => 'form-control')) }}
                @if($errors->has('skills')) <div class="alert alert-danger" role="alert">{{ $errors->first('skills') }}</div> @endif
				</div><br> 

				<div class='form-group'>
					{{ Form::label('talent', 'What is your Role in the entertainment industry:') }}<br>
					{{ Form::select('talent', array('0' => 'I am an Agent or Manager', '1' => 'I am the talent')) }}
                @if($errors->has('talent')) <div class="alert alert-danger" role="alert">{{ $errors->first('talent') }}</div> @endif
				</div>

				<div class='form-group'>
					{{ Form::label('dob', 'Please Enter Your Date Of Birth:', array('class' => 'col-sm-0 control')) }}
					{{-- Form::date('dob') --}}
					<br><input type='date' name='dob' class=''>
				</div>


				<div class="form-group">
					{{ Form::label('bio', 'Biography:') }}
					{{ Form::textarea('bio', '' , array('class' => 'form-control')) }}
                @if($errors->has('bio')) <div class="alert alert-danger" role="alert">{{ $errors->first('bio') }}</div> @endif
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
                @if($errors->has('company')) <div class="alert alert-danger" role="alert">{{ $errors->first('company') }}</div> @endif
				</div><br>

				<div class-"form-group">
					{{ Form::label('bio', 'Biography:') }}
					{{ Form::textarea('bio', '' , array('class' => 'form-control')) }}
                @if($errors->has('bio')) <div class="alert alert-danger" role="alert">{{ $errors->first('bio') }}</div> @endif
				</div><br>

				<div class="form-group">
					{{ Form::label('img', 'Please upload a profile photo') }}
					{{ Form::file('img') }}
					<p class="help-block">This step is optional.</p>
				</div>

				<div class="form-group">
					{{ Form::submit('Create Account', ['class' => 'btn btn-default']) }}
				</div>
			</div>
		</div>
	</div>			

	{{ Form::close() }}

	<script>

	$talentInputs = $('#talentInputs');

	$talentInputs.hide();


	$agentInputs = $('#agentInputs');

	$agentInputs.hide();

//maybe use .change() or .val() or :selected
function showTalent(){
	$("#showTalent").click(function(event){
		event.preventDefault();
		$("#talentInputs").slideToggle(500);
	});
}

function showAgent(){
	$("#showAgent").click(function(event){
		event.preventDefault();
		$("#agentInputs").slideToggle(500)
	});
}
</script>

@stop