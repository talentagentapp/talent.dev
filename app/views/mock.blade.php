@extends('layouts.master')

@section('title', "Landing")

<style>
  /*refactor to correctly enable*/
 /* .content
  {
    background-color: black;
    color: white;
    border-style: solid;
    border-width: 2px;
    border-color: white;
  }
*/
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

   <!-- Sets background image  -->
  body 
  /*{
    background-image: url(/img/movie_projector.gif);
  }*/


@section('content')

<div class="container">
  <div class="row">
     {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-horizontal', 'id' => 'login-page')) }}
    <div class="form-group">
      {{ Form::label('username', 'Username:', array('class' => "col-sm-1 control-label")) }}
      <div class="col-sm-4">
        {{ Form::text('username', Input::old('username'), array('class' => "form-control")) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('password', 'Password:', array('class' => "col-sm-1 control-label")) }}
      <div class='col-sm-4'>
        {{ Form::password('password', array('class' => 'form-control')) }}
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <div class="checkbox">
         {{ Form::checkbox('Remember me', 'yes', true) }}
      </div>
    </div>
  </div>
  <div class="form-group">    
    <div class="form-group">
      {{ Form::submit('Login', ['class' => 'btn btn-default']) }}
    </div>
  </div>
</form> 

</div> 

@stop