@extends('layouts.master')

@section('title', 'Gigs Index')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-4'>
            <h2>gigs
                <!-- <small> -->
                    @if(Auth::check())
                    <a class="btn btn-default btn-small" href="{{ action('GigsController@create') }}">create an event</a>
                    @endif
                <!-- </small> -->
            </h2>
        </div>
        <br>
        <div class='col-md-8'>
            {{ Form::open(['action' => 'GigsController@index', 'method' => 'GET']) }}
            <div class="input-group form-group">
                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'search for a gig']) }}
                <span class="input-group-btn">
                    <button class="btn btn-default" type='submit'><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
             @forelse($gigs as $gig)
             <article>
                <h3>{{{ $gig->name }}}</h3>

                <address>
                    By {{{ $gig->user->username }}}<br>
                    Where: {{{ $gig->location }}}<br>
                </address>

                <p>Description: {{{ $gig->description }}}</p>

                <p>When: {{{ $gig->date }}}</p>

                <a href="{{ action('GigsController@show', $gig->id) }}">more info <span class="glyphicon glyphicon-chevron-right"></span></a>
            </article>
            @empty
            <p>No mo' gigs.</p>
            @endforelse
        </div>
    </div>

    <div class='row'>
        <div class='col-md-12'>
            {{-- $gigs->links() --}}
        </div>
    </div>
</div>
@stop