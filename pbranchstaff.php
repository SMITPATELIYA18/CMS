<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	if(isset($_COOKIE['firsttime']))
	{
		header("Location:question.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Branch-Staff</title>
<!-- for-mobile-apps -->
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Courier Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- /font files -->
<!-- js files -->

<!-- /js files -->
</head>
<body>
<!-- navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html"><h1><span class="fa fa-diamond" aria-hidden="true"></span>Courier Guy</h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="pbranchstaff.php">Home</a></li>
				<li><a href="pverify.php">Verify</a></li>
				<li><a href="pupdate.php">Update Track</a></li>
				<li><a href="pdelivery.php">Delivery</a></li>
				<li><a href="pbranchform.php">Job Profile</a></li>
				<li>
					<a href="pbranchstaff.php" ><i class="fa fa-lock" aria-hidden="true"></i><?php echo $uname; ?></a>
				</li>
				<li class="dropdown">
					<a href="PProfileStore.php" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
					<div class="dropdown-content">
						<div class="track-w3ls">
							<a href="PProfileStore.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Profile</a>
						</div>
						<div class="track-w3ls">
							<a href="pAddress-details.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Address</a>
						</div>
					</div>
				</li>
				<li>
					<a href="Logout.php"><i class="fa fa-lock" aria-hidden="true"></i>Logout</a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
    </div>
</nav>
<!-- navigation -->
<!-- banner section -->
<section class="inner-w2ls">
	<div class="container">
		<h2 class="text-center w3 w3l agileinfo wthree">Courier Store Services</h2>
		<p class="text-center w3 w3l agileinfo wthree">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
	</div>
</section>
<!-- /banner section -->
<section class="service-w3ls">
	<div class="container">
		<i class="fa fa-braille" aria-hidden="true"></i>	
		<h3 class="text-center w3-agileits agileits-w3layouts agile w3-agile">Branch-Staff</h3>
		<p class="text-center w3-agileits agileits-w3layouts agile w3-agile"></p>
	</div>	
	<div class="container">
		<div class="col-lg-3 col-md-6 col-sm-6">	
			<ul class="ch-grid">
				<li>
					<div class="ch-item ch-img-1">				
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-1"></div>
								<div class="ch-info-back">
									<h3>Best In Delivery</h3>
									<p>By Courier Guy</p>
								</div>	
							</div>
						</div>
					</div>
				</li>
			</ul>	
			<h5>Best In Delivery</h5>
			<p class="serv-p1">A Branch-staff of a company that transports commercial packages and documents.‘the cheque was dispatched by courier’</p>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">	
			<ul class="ch-grid">
				<li>
					<div class="ch-item ch-img-2">
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-2"></div>
								<div class="ch-info-back">
									<h3>Best in Packing</h3>
									<p>By Courier Guy</p>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>			
			<h5>Best In Packing</h5>	
			<p class="serv-p1">Wrap each item in your box individually as this will offer better protection of the items whilst in transit, this will reduce the risk of the contents causing damage to other items in the box.</p>
		</div>	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<ul class="ch-grid">
				<li>
					<div class="ch-item ch-img-3">
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-3"></div>
								<div class="ch-info-back">
									<h3>Best In Transport</h3>
									<p>By Courier Guy</p>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<h5>Best In Transport</h5>
			<p class="serv-p1">Transport has always been the key to developing trade.</p>	
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<ul class="ch-grid">
				<li class="serv4">
					<div class="ch-item ch-img-4">
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-4"></div>
								<div class="ch-info-back">
									<h3>Best In Timing</h3>
									<p>By Courier Guy</p>
								</div>
							</div>
						</div>
					</div>
				</li>	
			</ul>
			<h5>Best In Timing</h5>
			<p class="serv-p1"> We should always understand the meaning of time and use it accordingly in positive way to fulfill some purpose.</p>
		</div>
		<div class="clearfix"></div>
	</div>	
</section>
<section class="service-agileits"> 
	<div class="container">
		<i class="fa fa-trophy" aria-hidden="true"></i>
		<h3 class="text-center">Branch-Staff Information</h3>
		<p class="text-center">branch staff is when new consignment orders are come then it will give the detail to the appropriate person like delivery boy so it will go to the pickup the consignment.</p>
	</div>
	<div class="container marketing">
		<!-- START THE FEATURETTES -->
		<div class="row featurette">
			<div class="col-md-7">
				<h4 class="featurette-heading">Verify-Consignment</h4>
				<p class="serv-p2">Enter the customs declaration number of the consignment you wish to verify. Wait for the service to respond to tell you if you can release the consignment to your premises.</p>
			</div>
			<div class="col-md-5 serv-w3layouts">
				<div class="hover01 column">
					<div>
						<figure><img class="featurette-image img-responsive center-block" src="images/service1.jpg" alt="Generic placeholder image"></figure>
					</div>
				</div>
			</div>
		</div>
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7 col-md-push-5">
				<h4 class="featurette-heading">Update Track-details</h4>
				<p class="serv-p2"> Tracking, the tool at the top of your page gives you Consignment updates in just one click. A tool built for speed, simplicity and convenience.</p>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<div class="hover01 column">
					<div>
						<figure><img class="featurette-image img-responsive center-block" src="images/service2.jpg" alt="Generic placeholder image"></figure>
					</div>
				</div>
			</div>
		</div>
		<hr class="featurette-divider">
		<div class="row featurette">
			<div class="col-md-7">
				<h4 class="featurette-heading">Update Job-details</h4>
				<p class="serv-p2">Job Summary Our company has courier company Responsibilities and Duties Delivery pick up and packing Required Experience, Skills and Qualifications.</p>
			</div>
			<div class="col-md-5 serv-w3layouts">
				<div class="hover01 column">
					<div>
						<figure><img class="featurette-image img-responsive center-block" src="images/service3.jpg" alt="Generic placeholder image"></figure>
					</div>
				</div>
			</div>
		</div>
	</div>
      <!-- /END THE FEATURETTES -->
</section>
<!-- footer section -->
<section class="footer-agileits">
	<div class="container">
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>More Info</h3>
			<ul class="info-links">
				<li><a href="about.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> About Us</a></li>
				<li><a href="contact.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Contact Us</a></li>
				<li><a href="icons.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> International Fuel Surcharge</a></li>
				<li><a href="privacy.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Domestic Fuel Surcharge</a></li>
				<li><a href="privacy.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Privacy Policy</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>New Customer</h3>
			<ul class="footer-links">
				<li><a href="Signup.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Open an Account</a></li>
				<li><a href="LoginStore.php"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Register for a login</a></li>
				<li><a href="process.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> New Customer Center</a></li>
			</ul>
			<br>
			<h3>Our Links</h3>
			<ul class="footer-links">
				<li><a href="service.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Our Services</a></li>
				<li><a href="work.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Our Work</a></li>
				<li><a href="process.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Process</a></li>
				<li><a href="typo.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Typography</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>Contact Info</h3>
			<div class="contact-info">
				<div class="address">	
					<i class="glyphicon glyphicon-globe"></i>
					<p class="p3">BVM</p>
					<p class="p4">Anand, India</p>
				</div>
				<div class="phone">
					<i class="glyphicon glyphicon-phone-alt"></i>
					<p class="p3">+91 9558994974</p>
					<p class="p4">+91 9408153976</p>
				</div>
				<div class="email-info">
					<i class="glyphicon glyphicon-envelope"></i>
					<p class="p5"><a href="mailto:myemail1@example.com">smitpa2000@gmail.com</a></p> 
					<p class="p6"><a href="mailto:myemail2@example.com">hmistry148@gmail.com</a></p>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>Subscribe Us</h3>
			<div class="subscribe">
				<form action="#" method="post">
					<div class="form-group">
						<input type="email" name="email2" class="form-control" id="inputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="text" name="user" class="form-control" id="text1" placeholder="Your Name">
					</div>
					<div class="form-group">
						<button type="submit" class="btn-outline">Subscribe</button>
					</div>
				</form>
			</div>	
			<ul class="social-icons2">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>
</section>
<!-- /footer section -->
<a href="#0" class="cd-top">Top</a>
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/index.js"></script>
<script src="js/top.js"></script> 
<script src="js/bgfader.js"></script>
<script>
var myBgFader = $('.header').bgfader([
  'images/banner1-1.jpg',
  'images/banner1-2.jpg',
  'images/banner1-3.jpg',
  'images/banner1-4.jpg',
], {
  'timeout': 2000,
  'speed': 3000,
  'opacity': 0.4
})

myBgFader.start()
</script>
<!-- /js files -->
</body>
</html>