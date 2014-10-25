
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
<body>
	<div>
		<div id="createToggle">
			<p>create user<p>
				<div id="createUserToggle">
					<a class="pure-button" href="?=talent">talent</a>
					<br>
					<a class="pure-button" href="?=agent">agent or manager</a>
				</div>
		</div>
			<br>
			@if(!Auth::user())
				<div id="loginToggle">
				<p>login</p>
					<div id="loginInfoToggle">
						{{ Form::open(['action' => 'HomeController@doLogin', 'method' => 'POST'])}}
						<div>
							{{ Form::label('username', 'Username') }}
						</div>
						<div>
							{{ Form::text('username', Input::old('username')) }}
							{{$errors->first('username', '<span class="help-block">:message</span>')}}
						</div>
						<div>
							{{ Form::label('password', 'Password') }}
						</div>
						<div>
							{{ Form::password('password') }}
							{{$errors->first('password', '<span class="help-block">:message</span>')}}
						</div>
						<div>
							<button>Submit</button>
						</div>
						{{ Form::close()}}
					</div>
				</div>
			@else
				<p>Logout</p>
			@endif

	</div>
	<div id='agentOrTalent'>
		<text>
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
