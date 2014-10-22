<<<<<<< HEAD
=======
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-12'>

            <h2>Edit Your Gig</h2>
            <hr>

            {{ Form::model($gig, ['route' => ['gigs.update', $gig->id], 'method' => 'PUT']) }}

            <div class='form-group'>
                {{ Form::label('name', 'Name of Your Gig:') }}
                {{ Form::text('name', $gig->name,['id' => 'name', 'class' => 'form-control']) }}
                @if($errors->has('name')) <div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div> @endif
            </div>
            <div class='form-group'>
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', $gig->description, ['id' => 'description', 'class' => 'form-control']) }}
                @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
            </div>
            <div class='form-group'>
                {{ Form::label('location', 'Where is This Event:') }}
                {{ Form::text('location', $gig->location, ['id' => 'location', 'class' => 'form-control']) }}
                @if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
            </div>
            <div class='from-group'>
                {{ Form::label('date', 'When is This Occurring:') }}
                <br><input type='date' name='date' id='date' class='form-control'><br>
                @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
            </div>
            <div class='from-group'>
                {{ Form::submit('Update Gig', ['class' => 'btn btn-default']) }}
            </div>

            {{ Form::close() }}

        </div>
    </div> 
</div>     
@stop
>>>>>>> 8af4f6dce289d4de6e4d7b2804a921bd9275fa50
