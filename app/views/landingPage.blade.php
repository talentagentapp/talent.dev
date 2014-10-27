@extends('layouts.master')

@section('contents')
	<div class='container'>
		<div id="createToggle">
			<p>create user<p>
			<div id="createUserToggle">
				<a class="btn btn-primary" href="?=talent">talent</a>
				<br>
				<a class="btn btn-primary" href="?=agent">agent or manager</a>
			</div>
		</div>
			<br>
			@if(!Auth::user())
			<div id="loginToggle">
				<p>login</p>
				<div id="loginInfoToggle">
					{{ Form::open(['action' => 'HomeController@doLogin', 'method' => 'POST'])}}
					<div class='form-group'>
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', Input::old('email')) }}
						{{$errors->first('email', '<span class="help-block">:message</span>')}}
					</div>
					<div class='form-group'>
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password') }}
						{{$errors->first('password', '<span class="help-block">:message</span>')}}
					</div>
					<div class='form-group'>
						<button class='btn btn-primary'>Submit</button>
					</div>
					{{ Form::close()}}
				</div>
			</div>
			@else
			<p>Logout</p>
			@endif
	</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script>

		$("#loginInfoToggle").hide();

		$("#createUserToggle").hide();

		$("#loginToggle").hover(
			function()
			{
				$("#loginInfoToggle").toggle("slow");
			});

		$("#createToggle").hover(
			function()
			{
				$("#createUserToggle").toggle("slow");
			});

		</script>

	</body>
	</html>
