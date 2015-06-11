<?php
require 'touch/srvc/db2bootstrap.php';
CheckSSL();
?><!DOCTYPE html>
<html lang="en" ng-app="orgjswapp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clancap - Cultural Hiring, Passion, Organisation driven by People</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--link rel="stylesheet" href="css/jquery.bxslider.css"-->
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-controller="ajpctrlr">
	<header>		
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="/"><h1>Clancap</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.html" class="active">Home</a></li>
								<!--li role="presentation"><a href="services.html">Services</a></li>
								<li role="presentation"><a href="blog.html">Blog</a></li>
								<li role="presentation"><a href="portfolio.html">Portfolio</a></li>
								<li role="presentation"><a href="contact.html">Contact</a></li-->						
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
   
	<!--div class="slider">
		<div class="img-responsive">
			<ul class="bxslider">				
				<li><img src="images/slider/1.jpg" alt=""/></li>								
				<li><img src="images/slider/2.jpg" alt=""/></li>	
				<li><img src="images/slider/3.jpg" alt=""/></li>			
			</ul>
		</div>	
    </div-->
    <div class="col-md-12">
    	<div class="col-md-8">
		    <div id="myCarousel" class="carousel slide">
		  <!-- Indicators -->
		  <ol class="carousel-indicators" >
		    <li ng-repeat="article in articles" data-target="#myCarousel" data-slide-to="{{$index}}" ng-class="($index==0) ? ' active' : ''"  >	</li>
		    <!--li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li-->
		  </ol>


		  <div class="carousel-inner" >
		    <div ng-repeat="article in articles"  ng-class="($index==0) ? 'item active' : 'item'" >
		      <img width="100%" ng-src="/touch/srvc/profiles.php?i=k&k={{article.mi}}" class="img-responsive">
		      <div class="container">
		        <div class="carousel-caption">
		        <a style=" " ng-href="/touch/srvc/post.php?a={{article.a}}" >
		        	<h3 style="color:blue; background-color: rgba(255, 255, 255, 0.6);
    
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
    
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)"; 
     color:blue; "> {{article.t}} </h3></a>
		          </div>
		      </div>
		    </div>
		    <!--div class="item">
		      <img src="http://lorempixel.com/1500/600/abstract/1" class="img-responsive">
		      <div class="container">
		        <div class="carousel-caption">
		          sadasdasd
		        </div>
		      </div>
		    </div-->
		    
		  </div>
		 
		  <!-- Controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <i class="glyphicon glyphicon-chevron-left"></i>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <i class="glyphicon glyphicon-chevron-right"></i>
		  </a>  
		</div>
	</div>
	<div class="col-md-4">
		<!----  Start: FB Group Settings  ---->
		<ul class="list-group">
		  <li class="list-group-item list-group-item-info">Jobs with Passion <a href=""> Facebook</a> </li>
		  <li class="list-group-item list-group-item-info">Bankers and Bikers <a href="">Facebook</a></li>
		  <li class="list-group-item list-group-item-info"> Engineers with Guitar<a href="">Facebook</a> </li>
		  <li class="list-group-item list-group-item-success">Jobs in Valley <a href="">Facebook </a></li>
		  <li class="list-group-item list-group-item-success">Bangalore Startup Jobs <a href="">Facebook </a></li>
		</ul>
	</div>
</div>

	
	<div class="container">
		<div class="text-center">
			
			<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
				<h2>Clancap Mobile &amp; Web Apps</h2>
			</div>
		</div>
	</div>
	
		<div class="box">
			<div class="wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.4s">
				<div class="col-sm-3">
					<img width="100%" src="images/android-icon.png" />
					<!--i class="fa fa-cogs fa-3x"></i-->
					<h4><a href="https://play.google.com/store/apps/details?id=com.clancap.www"><i class="fa fa-cloud-download fa-3x"></i></a></h4>
				</div>
			</div>
			<div class="wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.8s">
				<div class="col-sm-3">
					<img  width="100%" src="images/iosapp.png" />
					<!--i class="fa fa-cogs fa-3x"></i-->
					<h4><a href="#"><i class="fa fa-cloud-download fa-3x"></i><br/></a>Coming Soon</h4>
				</div>
			</div>
			<div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="1.2s">
				<div class="col-sm-3">
					<img  width="100%" src="images/wpapp.png" />
					<!--i class="fa fa-cogs fa-3x"></i-->
					<h4><a href="#"><i class="fa fa-cloud-download fa-3x"></i></a><br/>Coming Soon</h4>
				</div>
			</div>
			<div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="1.6s">
				<div class="col-sm-3">
					<img  width="100%" src="images/ccwebappicon.png" />
					<!--i class="fa fa-cogs fa-3x"></i-->
					<h4><a href="/touch/"><i class="fa fa-cloud fa-3x"></i></a></h4>
				</div>
			</div>
		</div>
	
	<div class="features">
		<div class="container">
			<div class="text-center">
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
					<h2>Clancap - New Era of Building Great Organisations</h2>
				</div>
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
					<p>Bras urna felis accumsan at ultrde cesid posuere masa socis nautoque<br>
					penat bus maecenas ultrices sed ipsum lorem
					dolor sit amet sed ipsum consectetur<br></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="col-lg-6 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.5s">
			<img src="images/6.jpg" class="img-responsive" >
		</div>
		
		<div class="col-lg-6 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.5s">
			<img src="images/5.jpg" class="img-responsive" >
		</div>
	</div>
	
	<div class="main-feature">
		<div class="container">
			<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
				<div class="media">
					<div class="media-left">					
						<i class="fa fa-rocket fa-3x"></i>
					</div>
					
					<div class="media-body">
						<h4 class="media-heading">SEO Optimized</h4>
						<p>Cras urna felis accumsan at ultricesid posuere masa um socisd natoque penatibus magnisd Lorem ipsum dolor sit ame onsectea dipe.</p>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
				<div class="media">
					<div class="media-left">					
						<i class="fa fa-camera fa-3x"></i>
					</div>
					
					<div class="media-body">
						<h4 class="media-heading">Easy to Install</h4>
						<p>Cras urna felis accumsan at ultricesid posuere masa um socisd natoque penatibus magnisd Lorem ipsum dolor sit ame onsectea dipe.</p>
					</div>
				</div>
			</div>
			
			<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
				<div class="media">
					<div class="media-left">					
						<i class="fa fa-heart-o fa-3x"></i>
					</div>
					
					<div class="media-body">
						<h4 class="media-heading">Unlimited Possibilities</h4>
						<p>Cras urna felis accumsan at ultricesid posuere masa um socisd natoque penatibus magnisd Lorem ipsum dolor sit ame onsectea dipe.</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="text-center">
			<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
				<h2>Easily Customizable &amp; Unlimited Support </h2>
			</div>
			<div class="wow bounceInUp" data-wow-offset="0" data-wow-delay="0.6s">
				<p>Integer orci enim varius vel accumsan vel porttitor tellus. Vivamus odio. Donec metus libero semper</p>
			</div>
			
			<button type="button" class="btn btn-default">Purchase Now</button>
			<button type="button" class="btn btn-default">learn More</button>
		</div>	
		
	</div>
	
	<div class="about-us">
		<div class="container">
			<div class="text-center">
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
					<h3>What People Are</h3>
				</div>
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
					<h2>Saying About Us</h2>
				</div>
				<div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="col-md-3">
						<img src="images/about/man4.jpg" alt="" >
						<h3>John Doe</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
					</div>
				</div>
				
				<div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="0.6s">
					<div class="col-md-3">
						<img src="images/about/man2.jpg" alt="" >
						<h3>John Doe</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
					</div>
				</div>
				
				<div class="wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
					<div class="col-md-3">
						<img src="images/about/man3.jpg" alt="" >
						<h3>John Doe</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
					</div>
				</div>
				
				<div class="wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.6s">
					<div class="col-md-3">
						<img src="images/about/man4.jpg" alt="" >
						<h3>John Doe</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
					</div>
				</div>
			</div>	
		</div>
	</div>
	
	<footer>
		<div class="footer">
			<div class="container">
				<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
					<h2>Multi</h2>
					<p>In a elit in lorem congue varius. Sed nec arcu.
					Etiam sit amet augue.
					Fusce fermen tum neque a rutrum varius odio pede 
					ullamcorp-er tellus ut dignissim nisi risus non tortor.
					Aliquam mollis neque.</p>
					
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
					</ul>
				</div>
				
				<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">
					<h3>RECENT POSTS</h3>
					<ul>
						<li>Awesome Design with Overviews</li><hr>
						<li>Great Design with Features </li><hr>
						<li>Limitless functions & Works </li><hr>
						<li>Multi is simple and clean design</li>
					</ul>
				</div>
				
				<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
					<h3>CONTACT INFO</h3>
					<ul>
						<li><i class="fa fa-home fa-2x"></i> Office # 138, Suite 54 Elizebth Street, Victoria State Newyork, USA 33026</li><hr>
						<li><i class="fa fa-phone fa-2x"></i> +1-310-929-5300</li><hr>
						<li><i class="fa fa-envelope fa-2x"></i> support@clancap.com</li>
					</ul>
				</div>
				
			</div>
		</div>
		
		<div class="sub-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						&copy; 2015 <a target="_blank" href="https://www.clancap.com/" title="Cultural Hiring and Building Great Organisations">Clancap</a>. All Rights Reserved.
					</div>
					<div class="col-md-6">
						<ul class="pull-right">
							<li><a href="#">Home</a></li>
							<!--li><a href="#">Services</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Portfolio</a></li>
							<li><a href="#">Contact</a></li-->
						</ul>
					</div>
				</div>
				<div class="pull-right">
					<a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
				</div>
			</div>
		</div>	

	</footer>
   
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
    <script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script> 
	<script src="js/functions.js"></script>
	<script src="bower_components/angular/angular.min.js"></script>
    <script src="js/homecontrollers.js"></script>
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>
	
  </body>
</html>