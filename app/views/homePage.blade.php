@extends('layouts.master')

@section('title', 'Homepage')

@section('content')
<div class='container'>
    <div class='row'>
        <div id='featured-talent'  class='col-md-8'>
            <p>DANGIT</p>
        </div>
        <div class='col-md-4' style='background-color:blue;'>
            @foreach ($gigs as $gig)
            <h3>{{{$gig->name}}}</h3>
            <p>{{{$gig->description}}}</p>
            <p>{{{$gig->location}}}</p>
            @endforeach
        </div>
    </div>
    <div id='bottom-row' class='row'>
        <div class='col-md-12'>
            <p>so much stuff in this row will be cool man someday</p>
        </div>
    </div>
</div>
<div>
    {{--calendar--}}
</div>
@stop