@extends('layouts.master')

@section('title', 'Users Index')

@section('content')
<div class="container">
    @forelse($users as $user)
    <div class='row'>
        <div class='col-md-4'>
            <img src="{{ $user->img }}" alt="">
        </div>
        <div class='col-md-8'>
            <h3>{{{ $user->first . ' ' . $user->last }}}</h3>
            <p>{{{ $user->experience }}} Years of Experience.</p>
            <p>{{{ $user->bio }}}</p>
        </div>
    </div>
    <hr>
    @empty
    <p>No mo' users.</p>
    @endforelse
</div>
@stop