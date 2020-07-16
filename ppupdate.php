<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$id=$_GET['id'];
	$sql="SELECT * FROM consignment where con_id=$id";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
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
<link href="css/w3css.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- /font files -->
<!-- js files -->
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
                <li><a href="pbranchstaff.php">Home</a></li>
                <li class="active"><a href="pverify.php">Verify</a></li>
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
<br/>
<br/>
<br/>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Branch-Staff</h2>
                </div>
				<div class="card-body">
                    <form method="POST" action="pppupdate.php">
                    	<div class="form-row">
                            <div class="name">Order ID:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="order_id" value="<?php echo $row['con_id'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">User-Name:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="User_Name" value="<?php echo $row['user_name'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Source:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="source" value="<?php echo $row['source'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Source Branch ID:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="sou_bra_id" value="<?php echo $row['branch_sou_id'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Destination:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="destination" value="<?php echo $row['destination'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Destination Branch ID:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="des_bran_id" value="<?php echo $row['branch_des_id'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Speed Mode:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="s_mode" value="<?php echo $row['s_mode'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Weight:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="weight" value="<?php echo $row['weight'];  ?>">(In Kg)
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Delivery Date:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="d_date" value="<?php echo $row['delivery_date'];  ?>">
                                </div>
                            </div>
                        </div>
                    	<div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                        </div>
                    </form>
                    <div style="text-align:right;">
                            <button class="btn btn--radius-2 btn--red" name="back" onclick="window.location = 'pverify.php'">Back </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br/>
<br/>
<br/>
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
<!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
<!-- /js files -->
</body>