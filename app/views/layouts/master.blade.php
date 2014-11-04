<!DOCTYPE html>
<html>
<head>
  <title>@yield('title', 'Talent Site')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/img/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/datepicker.css">


  @yield('style')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src ="/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css">
  <script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" <a href="#">rising talent</a></li>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li @if (Route::currentRouteUses('HomeController@showHomePage')) class='active' @endif><a href="{{ action('HomeController@showHomePage') }}">homepage</a></li>
          <li @if (Route::currentRouteUses('UsersController@index')) class='active' @endif><a href="{{ action('UsersController@index') }}">users</a></li>
          <li @if (Route::currentRouteUses('GigsController@index')) class='active' @endif><a href="{{ action('GigsController@index') }}">gigs</a></li>
          <li @if (Route::currentRouteUses('HomeController@showCalendar')) class='active' @endif><a href="{{action('HomeController@showCalendar')}}">current events</a>
          </li>
          <li @if (Route::currentRouteUses('HomeController@showAbout')) class='active' @endif><a href="/about">about</a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
          @if (Auth::check())
          <li><a href="#">{{ Auth::user()->username }} is logged in</a></li>
          <li><a href="/logout">log out</a></li>
          @else
          <li><a href="/">log in</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer>
    <div class='container-fluid'>
      <div class="row">
        <div class="col-lg-12">
          <hr>
          <p>adam | audrey | cory | codeup | 2014</p>
        </div>
      </div>
    </div>
  </footer>

  @yield('bottom-script')

  <script>
  $('#nav_cal_dropdown').datepicker()
  </script>

</body>
</html>