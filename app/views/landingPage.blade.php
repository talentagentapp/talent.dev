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
    <div class='row'>

        <div id="createToggle" class='col-md-6'>
            <h2>create user</h2>
            <div id="createUserToggle">
                <!-- TODO:change these to an action -->
                <a class="btn btn-default" href="users/create?role=talent">talent</a>
                <p>or</p>
                <a class="btn btn-default" href="users/create?role=agent">agent or manager</a>
            </div>
        </div>

        <div id="loginToggle" class='col-md-6'>
            @if(!Auth::user())
            <h2>log in</h2>
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
            @endif
        </div>
    </div>
</div>
@stop

@section('bottom-script')
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
@stop