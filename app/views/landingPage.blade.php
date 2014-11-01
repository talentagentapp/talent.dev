@extends('layouts.master')

@section('title', "Landing")

@section('style')
<style>
.navbar-inverse 
{ display: none; }

body
{
  background: url(/img/fixedBackgroundoption.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
footer
{
    position: absolute;
    bottom: 0;
}

h2
{
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
    font-size: 35px;
}

</style>
@stop

@section('content')
<div class='container'>
    @if(!Auth::user())
    <div class='row'>
        <div id="loginToggle" class='col-md-6 col-md-offset-6'>
            <h2>login</h2>
            <div id="loginInfoToggle">
                {{ Form::open(['action' => 'HomeController@doLogin', 'method' => 'POST'])}}
                <div class='form-group'>
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'email']) }}
                    {{$errors->first('email', '<span class="help-block">:message</span>')}}
                </div>
                <div class='form-group'>
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
                    {{$errors->first('password', '<span class="help-block">:message</span>')}}
                </div>
                <div class='form-group'>
                    <button class='btn btn-default'>submit</button>
                </div>
                {{ Form::close()}}   
            </div>    
        </div>
    </div>

    <div class="row">
        <div id="createToggle" class='col-md-6 col-md-offset-6'>
            <h2>create user</h2>
            <div id="createUserToggle">
                <!-- TODO:change these to an action -->
                <a class="btn btn-default" href="users/create?role=talent">talent</a>
                <p>or</p>
                <a class="btn btn-default" href="users/create?role=agent">agent or manager</a>
            </div>
        </div>
    </div>
    @endif
    
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <h2>mission statement</h2>
            <p id="missionToggle">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
</div>
@stop

@section('bottom-script')
<script>

$("#loginInfoToggle").hide();
$("#createUserToggle").hide();

var missionTimeout;
var showMissionStatement = function() {
    $("#missionToggle").show("slow");
}

$("#loginToggle").hover(function()
{
    clearTimeout(missionTimeout);

    $("#loginInfoToggle").show("slow");
    $("#createUserToggle").hide("slow");
    $("#missionToggle").hide("slow");
}, function() {
    $("#loginInfoToggle").hide("slow");
    missionTimeout = setTimeout(showMissionStatement, 200);
});

$("#createToggle").hover(function()
{
    clearTimeout(missionTimeout);
    
    $("#loginInfoToggle").hide("slow");
    $("#createUserToggle").show("slow");
    $("#missionToggle").hide("slow");
}, function() {
    $("#createUserToggle").hide("slow");
    missionTimeout = setTimeout(showMissionStatement, 200);
});

</script>
@stop