<!DOCTYPE html>
<html>
<head>
  <title>@yield('title', 'Talent Site')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="language" content="english">
  <meta name="description" content="">
  <meta name="author" content=""> 
  
  <link rel="icon" href="/img/favicon.ico">

  <!-- <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Sliding Box with CSS3 Transitions</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico"> -->
  
  <!-- <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/master.blade.css">  -->

  @yield('style')

  <style>
  .container
  {
    /*background-color: black;*/
    color: white;
  }

  #bg
  {
    position: fixed; 
    top: -50%; 
    left: -50%; 
    width: 200%; 
    height: 200%;
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
  }

  footer
  {
    margin: 50px 0;
  }

   <!-- Sets background image  -->
 /* body 
  {
    background-image: url(/img/slow_metropolis.gif);
  }*/

  </style>
</head>    
<body>

  <!--Logic for sliding navbar  -->
<!-- <div class="tophiddenbar" id="tophiddenbar">
    <div class="container">
      <div id="topbar"><a href="http://designshack.net">Back to Design Shack</a
        <li><a href="#contact">Contact Me</a></li>
        </div> 
    </div>  
  </div> -->

  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" <a href="/">Talent App</a></li>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li @if (Route::currentRouteUses('UsersController@index')) class='active' @endif><a href="/users">Users</a></li>
          <li @if (Route::currentRouteUses('GigsController@index')) class='active' @endif><a href="/gigs">Gigs</a></li>
          <li @if (Route::currentRouteUses('HomeController@showAbout')) class='active' @endif><a href="/about">About</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events Calendar <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">January</a></li>
              <li><a href="#">February</a></li>
              <li><a href="#">March</a></li>
              <li><a href="#">April</a></li>
              <li><a href="#">May</a></li>
              <li><a href="#">June</a></li>
              <li><a href="#">July</a></li>
              <li><a href="#">August</a></li>
              <li><a href="#">September</a></li>
              <li><a href="#">October</a></li>
              <li><a href="#">November</a></li>
              <li><a href="#">December</a></li>
            </ul>
          </li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
          @if (Auth::check())
          <li><a href="#">{{ Auth::user()->username }} is logged in</a></li>
          <li><a href="/logout">Log Out</a></li>
          @else
          <li><a href="/">Log In</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sets background image  -->
<div id="bg">
  <img src="/img/slow_metropolis.gif" alt="">
</div>

@yield('content')

<footer>
  <div class='container'>
    <div class="row">
      <div class="col-lg-12">
        <hr>
        <p>Adam | Audrey | Cory | Codeup | 2014</p>
      </div>
    </div>
  </div>
</footer>

</body>
</html>