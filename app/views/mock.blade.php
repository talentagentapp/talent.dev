@extends('layouts.master')
<head>
  <style>

  #bg
  {
    position: fixed; 
    top: -50%; 
    left: -50%; 
    width: 200%; 
    height: 200%;
    background-color: black;
    ;
  }

  #bg img
  {
    position: absolute; 
    top: 0; 
    left: 0; 
    right: 0; 
    bottom: 0; 
    margin: auto; 
    min-width: 50%;
    min-height: 50%;
    -webkit-animation: mymove 10s infinite; /* Chrome, Safari, Opera */
    animation: mymove 10s;
  }

  */
  footer
  {
    margin: 50px 0;
  }

  .col-sm-1
  {
    color: white;
  }

/*#body
{
  min-width: 600px;
  background-origin: padding-box;
  }*/

  .row
  {
    /*position: relative;*/
    float: right;
    padding-top: 350px;
    color: white;
  }

  h1 {
    /*position: absolute;*/
    font-family: Origin, Helvetica Light, sans-serif; 
    text-transform: uppercase; 
    font-size: 10rem; 
    color: rgb(255,242,181); 
    background-image: -webkit-linear-gradient(rgb(255,242,181) 28%, 
      rgb(77,77,77) 40%, rgb(255,242,181) 54%); 
    text-align: center; 
    -webkit-background-clip:text; 
    -webkit-text-fill-color: transparent; 
    letter-spacing: .5rem;
    -webkit-text-stroke: 1px black; text-stroke: 1px black, thickness color;
  }

  /*Allow for animation of <h1> text*/
  /*standard syntax*/
  @keyframes mymove 
  {
    50% {opacity: 0;}
  }

  /* Chrome, Safari, Opera */
  @-webkit-keyframes mymove {
    50% {opacity: 0;}
  }


/*@keyframes infinite-spinning {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
  }*/

  </style>
</head>

  <!-- <div id="bg">
    <img src="/img/bright.jpg" alt=""> 
  </div> -->
  <div id="bg">
    <img src="/img/single_star.jpg" alt""> 
    <img src="/img/girl.jpg" alt"">
    <img src="/img/joan_of_arc.jpg" alt"">
  </div>  

  <!-- <div class="container"> -->
   <!--  <div class="row">
      <div class="col-md-12"><h1>Talent. </h1>
        <div class="col-md-0">
        </div>
      </div>
    </div> -->
    <!-- </div> -->
    <!-- </body> -->

