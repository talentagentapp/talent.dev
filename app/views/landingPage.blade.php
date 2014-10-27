@extends('layouts.master')

@section('title', "Landing")

@section('content')

<style>
#bg
{
  position: fixed; 
  top: -50%; 
  left: -50%; 
  width: 200%; 
  height: 200%;
}
#bg img
{
  position: absolute; 
  top: 0; 
  left: 0; 
  right: 0; 
  bottom: 0; 
  margin: auto; 
  min-width: 50%;
  min-height: 50%;
}

footer
{
  margin: 50px 0;
}

.col-sm-1
{
  color: white;
}


</style>

<!-- Sets background image  -->
 <div id="bg">
  <img src="/img/movie_projector.gif" alt="">
</div>


<div class="container">
  <div class="row">
    
   {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-horizontal', 'id' => 'login-page')) }}
   <div class="form-group">
    {{ Form::label('email', 'Email:', array('class' => "col-sm-1 control-label")) }}
    <div class="col-sm-4">
      {{ Form::text('email', Input::old('email'), array('class' => "form-control", 'placeholder' => 'E-mail')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('password', 'Password:', array('class' => "col-sm-1 control-label")) }}
    <div class='col-sm-4'>
      {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
    </div>
  </div>

</div>

<div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <div class="checkbox">
      <label>
       {{ Form::checkbox('', 'yes', false) }} Remember Me
     </label>
   </div>
 </div>
</div>

<div class="form-group">    
  <div class="col-sm-offset-1 col-sm-10">
    {{ Form::submit('Login', ['class' => 'btn btn-default']) }}
  </div>
</div>

<div class="container">
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-10">
      <p>Not a Member Yet?</p>
      {{ Form::submit('Create Account!', ['class' => 'btn btn-default']) }}
    </div>
  </div>
</div> 

{{ Form::close() }}
</div> 

@stop