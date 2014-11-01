@extends('layouts.master')

@section('title', 'Users Index')

@section('content')
<div class="container">

    <div class='row'>

        <div class="col-md-4">
            <h1>Our Users</h1>
        </div>
        <br>
        <div class='col-md-8'>
            {{ Form::open(['action' => 'UsersController@index', 'method' => 'GET']) }}
            <div class="input-group form-group">
                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'search for a user by name or tags']) }}
                <span class="input-group-btn">
                    <button class="btn btn-default" type='submit'><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            {{ Form::close() }}
        </div>

    </div>
    <hr>

    @forelse($users as $user)
    <div class='row'>
        <div class='col-md-4'>
            <a href="{{ action('UsersController@show', $user->id) }}"><img src="{{ $user->img }}" class='img-responsive'></a>
        </div>
        <div class='col-md-8'>
            <h3>{{{ $user->first . ' ' . $user->last }}} <small>{{{ $user->role }}}</small></h3>
            <p>{{{ $user->experience }}} Years of Experience.</p>
            <p>{{{ $user->bio }}}</p>
            <p>$user->talent->tag

            <a class="btn btn-sm btn-default" href="{{ action('UsersController@show', $user->id) }}">more info <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <hr>
    @empty
    <p>No more users.</p>
    @endforelse

    <div class='row'>
        <div class='col-md-12'>
            {{-- $users->links() --}}
        </div>
    </div>
</div>
@stop