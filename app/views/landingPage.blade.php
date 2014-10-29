@extends('layouts.master')

@section('title', "Landing")

@section('content')
<div class='container'>
    <div class='row'>

        <div class='col-md-6'>
            <div id="createToggle">
                <h2>create user</h2>
                <div id="createUserToggle">
                    <!-- TODO:change these to an action -->
                    <a class="btn btn-default" href="users/create?role=talent">talent</a>
                    <p>or</p>
                    <a class="btn btn-default" href="users/create?role=agent">agent or manager</a>
                </div>
            </div>
        </div>

        <div class='col-md-6'>
            @if(!Auth::user())
            <div id="loginToggle">
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