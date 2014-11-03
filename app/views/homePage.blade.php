@extends('layouts.master')

@section('title', 'Homepage')
<style>
h3
{
    text-decoration:underline;
}
</style>

@section('content')
<div class='container'>
    <div class='row'>
        <div id='featured-talent'  class='col-md-8'>
        <h1>Featured User</h1>
            <div class='row'>

                <div class='col-md-8'>
                    <h1>{{{ $user->first . ' ' . $user->last }}}</h1>
                    <img src="{{ $user->img }}" class='img-thumbnail img-responsive'>
                    <h4><a href="mailto:{{{ $user->email }}}">{{{ $user->email }}}</a></h4>
                    <p>{{{ $user->bio }}}</p>
                </div>

                <div class='col-md-4'>
                    <h3>Additional Profile Information</h3>
                    <hr>
                    <p>{{{ $user->skills }}}</p>
                    <p>I have {{{ $user->experience }}} years of experience.</p>
                    <p>Gender: {{{ $user->gender_str }}}</p>
                </div>
            </div>
        </div>
        <div class='col-md-4' style='background-color:#A19A97;'>
            @foreach ($gigs as $gig)
            <h3>{{{$gig->name}}}</h3>
            <p>{{{$gig->description}}}</p>
            <p>{{{$gig->location}}}</p>
            @endforeach
        </div>
    </div>
    <div class="row">
        
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