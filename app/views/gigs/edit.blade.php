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
                @if($errors->has('description')) <div class="alert alert-danger" role="alert">{{ $errors->first('description') }}</div> @endif
            </div>
            <div class='form-group'>
                {{ Form::label('location', 'Where is This Event:') }}
                {{ Form::text('location', $gig->location, ['id' => 'location', 'class' => 'form-control']) }}
                @if($errors->has('location')) <div class="alert alert-danger" role="alert">{{ $errors->first('location') }}</div> @endif
            </div>
            <div class='from-group'>
                {{ Form::label('date', 'When is This Occurring:') }}
                <br><input type='date' name='date' id='date' class='form-control'><br>
                @if($errors->has('date')) <div class="alert alert-danger" role="alert">{{ $errors->first('date') }}</div> @endif
            </div>
            <div class='from-group'>
                {{ Form::submit('Update Gig', ['class' => 'btn btn-default']) }}
            </div>

            {{ Form::close() }}

        </div>
    </div> 
</div>     
@stop