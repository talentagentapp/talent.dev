@extends('layouts.master')

@section('title', 'Gigs Index')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <h2>Available Gigs
                @if(Auth::check())
                <small><a href="{{ action('GigsController@create') }}">create</a></small>
                @endif
            </h2>
            <hr>

            @forelse($gigs as $gig)
            <article>
                <h3>{{{ $gig->name }}}</h3>

                <address>
                    By [Agent Name Here].<br>
                    Where: {{{ $gig->location }}}<br>
                </address>

                <p>Description: {{{ $gig->description }}}</p>

                <p>When: {{{ $gig->date }}}</p>

                <a class="btn btn-sm btn-default" href="{{ action('GigsController@show', $gig->id) }}">more info <span class="glyphicon glyphicon-chevron-right"></span></a>
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