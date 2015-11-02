<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="bootstap/css/bootstrap-theme.css"/>
        <link rel="stylesheet" type="text/css" href="bootstap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="bootstap/css/bootstrap.min.css"/>
        
        <link rel="stylesheet" type="text/css" href="bootstap/css/bootstrap-responsive.css"/>
        <script src="bootstap/js/bootstrap.min.js"></script>
         <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/wp-content/themes/clear-theme/img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/wp-content/themes/clear-theme/img/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/wp-content/themes/clear-theme/img/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/wp-content/themes/clear-theme/img/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/wp-content/themes/clear-theme/img/favicon.png">
        <title></title>
        <script src="mybootstrap.ru/wp-content/themes/clear-theme/js/jquery.js"></script>
    <script src="mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-transition.js"></script>
    <script src="mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-alert.js"></script>
    <script src="mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-modal.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-dropdown.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-scrollspy.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-tab.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-tooltip.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-popover.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-button.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-collapse.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-carousel.js"></script>
    <script src="http://mybootstrap.ru/wp-content/themes/clear-theme/js/bootstrap-typeahead.js"></script>
    <script>
		$('.carousel').carousel({
			interval: 5000 //changes the speed
		})
	</script>
    </head>
    <body>
   

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
       	<header id="myCarousel" class="carousel slide">
		<!-- Indicators -->
		<ol style="margin-bottom: 1%" " class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div style="height:500px;" class="carousel-inner">
			<div class="item active">
				<div class="fill" style="background-image:url('Pictures/1.jpg');"></div>
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<div class="fill" style="background-image:url('Pictures/2.jpg');"></div>
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<div class="fill" style="background-image:url('Pictures/3.jpg');"></div>
				<div class="carousel-caption">
				</div>
			</div>
		</div>

		<div class="container">

			<!-- Marketing Icons Section -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Добро пожаловать на сайт общежития НИЯУ МИФИ!
					</h1>
				</div>
			</div>
		<!-- Controls -->
		<a style="height:500px;" class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a style="height:500px;" class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
	</header>
        <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div>
    </body>
</html>
