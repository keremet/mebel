<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Aug 2015 05:42:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>МебелиON</title>

    @section('css')
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    @show

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">МебелиON</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li @yield('home-active')><a href="/">Главная</a></li>
                <li @yield('executors-active')><a href="/executors">Производители</a></li>
                <li @yield('models-active')><a href="/models">Модели</a></li>
              </ul>
              @if (isset($auth_user))
              <ul class="nav navbar-right navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{$auth_user->name}} <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="/model"><i class="glyphicon glyphicon-file"></i> Мои модели</a>
                    </li>
                    <li>
                      <a href="/profile"><i class="glyphicon glyphicon-user"></i> Мой профиль</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                       <a href="/logout"><i class="glyphicon glyphicon-off"></i> Выход</a>
                    </li>
                  </ul>
                </li>
              </ul>
              @else
              <ul class="nav navbar-right navbar-nav">
                <li><a href="/login">Вход</a></li>
              </ul>
              <ul class="nav navbar-right navbar-nav">
                <li><a href="/register">Регистрация</a></li>
              </ul>
              @endif
            </div>
          </div>
        </nav>
      </div>
    </div>

    @yield('content')

    <!-- FOOTER -->
    <footer>
      <p class="pull-right"><a href="#">Вверх</a></p>
      <p>&copy; 2018 МебелиON &middot; <!--a href="#">Privacy</a> &middot; <a href="#">Terms</a--></p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/js/vendor/holder.min.html"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    @section('javascript')
    @show
  </body>

<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Aug 2015 05:42:34 GMT -->
</html>
