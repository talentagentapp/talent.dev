@extends('layouts.master')

@section('content')
<div class="container">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div id="myModalBody" class="modal-body">
                            <p>Modal Body</p>
                        </div>
                        <div class="modal-footer">
                            <button id="modalfontcolor" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class='col-md-12'>
            <h2>Available Gigs
                <small>

                    @if(Input::has('cdate'))
                        <a href="?cdate={{{ Input::get('cdate') }}}&amp;cv=week">week</a>
                        <a href="?cdate={{{ Input::get('cdate') }}}&amp;cv=day">day</a>
                        @if(Input::has('cv'))
                            <a href="?">month</a>
                        @endif
                    @else
                        <a href="?cv=week">week</a>
                        <a href="?cv=day">day</a>
                        @if(Input::has('cv'))
                            <a href="?">month</a>
                        @endif
                    @endif
                </small>
            </h2>

            {{$displayCalendar}}

        </div>
    </div>
</div>
@stop

@section('bottom-script')
<script type="text/javascript">

    $('.gig-modal').click(function(event) {
        var url = $(this).attr('href');

        $.get(url, function(data) {
            $("#myModalLabel").text(data.gig.name)
            $("#myModalBody").text(data.gig.description)
            $('.bs-example-modal-lg').modal();
        });

        event.preventDefault();
    });

    $("td").not(':first').hover(
      function () {
        $(this).css("background","rgba(0,0,100,0.3)");
      },
      function () {
        $(this).css("background","");
      }
    );
</script>
@stop