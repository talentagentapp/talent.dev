<!DOCTYPE html>
<html>
<head>
  <title>@yield('project title')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- css optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="english">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <link rel="icon" href="../../favicon.ico">


    @yield('style')
</head>    

<body>
  @yield('content')

    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" <a href="">Home</a></li>
            </div>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <!--add logic so that login/logout toggles between opposing option, depending on current status -->
                <li class="active"><li><a href=" ">Login</a>
                <li><a href="{{{ action('HomeController@doLogout') }}}">Logout</a>  
                  <!-- create a dropdown menu under the contact me button to include resume, ect -->
                 <li><a href=" ">link</a>
                <li><a href="#contact">Contact Me</a></li>
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
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
   

@yield('content')

</div>


<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
	</script>	
</footer>

</body>
</html>