@extends('layouts.master')

@section('title', "Landing")

@section('content')

<div class="container">
  <div class="row">
     {{-- Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-horizontal', 'id' => 'login-page')) --}}
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
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>	

</div> 

@stop