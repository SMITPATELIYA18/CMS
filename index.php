<?php
	session_start();
	if(isset($_SESSION['user_name']))
	{
		$uname=$_SESSION['user_name'];
		$conn=mysqli_connect("localhost","root","","courier_system");
		$sql="select * from login where user_name='$uname'";
		$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
		$type=$row['user_type'];
		if($type=="Consumer")
			header("Location:ind1.php");
		else if($type=="Staff")
			header("Location:pbranchstaff.php");
		else if($type=="Delivery Boy")
			header("Location:dDelivery-Boy.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Courier Guy</title>
<!-- for-mobile-apps -->
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
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="LoginStore.php?str=Please Login First">Add Consignment</a></li>
				<li><a href="PriceStore.php">Pricing</a></li>
				<li><a href="feedback1.php">Contact</a></li>
				<li><a href="LoginStore.php" ><i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
				<li><a href="Signup1.php" ><i class="fa fa-lock" aria-hidden="true"></i>Signup</a></li>
			</ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- navigation -->
<!-- banner section -->
<!-- <section class="banner-w3ls">
	<div class='header'>
		<div class="banner-w3layouts">
			<div class="container">
				<h2 class="text-center w3 w3l agileinfo">Enabling Courier Store</h2>	
				<p class="text-center w3 w3l agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
			</div>
		</div>
	</div>
</section> -->
<!-- /banner section -->
<!-- specialization section -->
<section class="special-w3layouts">
	<div class="container">
		<h3 class="text-center wthree w3-agileits">Courier Guy</h3>
		<p class="text-center wthree w3-agileits">Our trained shipping experts can help you save time and money with local knowledge on a global scale.You can be sure your business is in good hands with us.</p>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<a href='LoginStore.php?str=Please Login First'><img src="images/eye1.png" alt="" class="img-responsive"></a>
			<h4 class="text-center">Add Consignment</h4>
			<p class="special-p1">For Add Consignment Click on image.</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<a href='PriceStore.php'><img src="images/ruppe1.jpg" alt="" class="img-responsive"></a>
			<h4 class="text-center">Price</h4>
			<p class="special-p1">Click on image for Price Check.</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<a href='feedback1.php'><img src="images/contect.png" alt="" class="img-responsive"></a>
			<h4 class="text-center">Contact Us</h4>
			<p class="special-p1">For any query related to your consignment click on image.</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<a href='LoginStore.php'><img src="images/login.png" alt="" class="img-responsive"></a>
			<h4 class="text-center">Login</h4>
			<p class="special-p1"></p>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /specialization section -->
<!-- 2nd banner section -->
<section class="banner-w3ls2">
	<div class="container">
		<h3 class="text-center agileits-w3layouts agile w3-agile">Giving The Best Solutions</h3>
	</div>
</section>
<!-- /2nd banner section -->
<!-- 2nd info section -->
<section class="info-w3ls2">
	<div class="container">
		<i class="fa fa-trophy" aria-hidden="true"></i>
		<h3 class="text-center agileits-w3layouts agile w3-agile">Always Delivering Best Of Our Services</h3>
		<p class="text-center">Treat you fairly, with respect and consideration.Deliver high quality, value for money services organised around your needs.</p>
	</div>
</section>
<!-- /2nd info section -->
<!-- 3rd banner section -->
<section class="banner-w3ls3">
	<div class="container">
		<h3 class="text-center">Making Our Customers Satisfied</h3>
	</div>
</section>
<!-- /3rd banner section -->
<!-- 3rd info section -->
<section class="info-w3ls3">
	<div class="container">
		<i class="fa fa-smile-o" aria-hidden="true"></i>
		<h3 class="text-center">Making Our Customers Happy</h3>
		<p class="text-center">Each customer has individual needs and concerns and they want to be treated with a personal touch that does not make them feel like a number.Communicate in the manner your customers like to communicate.Offering an excellent customer service calls for an open mind – and a lot of patience. While we all understand that it’s easy to judge customers based on their attitude, appearance, age or even just the way they talk, you should always refrain from making assumptions about your potential customers.</p>
	</div>
</section>
<!-- /3rd info section -->
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
				<li><a href="service.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Open an Account</a></li>
				<li><a href="work.html"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Register for a login</a></li>
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