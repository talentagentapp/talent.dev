@extends('layouts.master')

@section('body')

  <div class="container">

    {{{ Form::open() }}}

    <div>
      {{ Form::file('image') }}
     </div>
      
    <!-- <div>
      {{-- Form::label('Search', 'search') --}}

      {{-- Form::text('search', Input::get('search')) --}}
    </div>  
 -->

    {{{ Form::close() }}}
  </div>

    <!--Create logic below to iterate through individual user profiles-->
    

@stop