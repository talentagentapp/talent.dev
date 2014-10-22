@extends('layouts.master')

@section('title', 'Gigs Index')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            <h2>Available Gigs</h2>
            <hr>

            @forelse($gigs as $gig)
            <h3>{{{ $gig->name }}}</h3>

            <p>What: {{{ $gig->description }}}</p>

            <p>Where: {{{ $gig->location }}}</p>

            <p>When: {{{ $gig->date }}}</p>
            @empty
            <p>No mo' gigs.</p>
            @endforelse
        </div>
    </div> 
</div>     
@stop