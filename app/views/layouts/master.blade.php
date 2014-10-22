<!DOCTYPE html>
<html>
<head>
  <title>@yield('title', 'Talent Site')</title>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- css optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="language" content="english">
  <meta name="description" content="">
  <meta name="author" content=""> 
  
  <link rel="icon" href="../../favicon.ico">

  <!-- <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Sliding Box with CSS3 Transitions</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico"> -->
  
  <!-- <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/master.blade.css">  -->
                              

@yield('style')

  <style>
  #bg {
    position: fixed; 
    top: -50%; 
    left: -50%; 
    width: 200%; 
    height: 200%;
  }
  #bg img {
    position: absolute; 
    top: 0; 
    left: 0; 
    right: 0; 
    bottom: 0; 
    margin: auto; 
    min-width: 50%;
    min-height: 50%;
  }
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
                <li class="active"><li><a href=" ">Login</a>
                <li><a href=" ">Logout</a>  
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
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>


<!-- Sets background image  -->
<!-- <div id="bg">
  <img src="/img/slow_metropolis.gif" alt="">
</div> -->

@yield('content')

<footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
  </script> 
</footer>

</body>
</html>