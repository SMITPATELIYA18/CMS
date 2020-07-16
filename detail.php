<?php
	ini_set("display_errors",'Off');
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$id=$_GET['con'];
	$_SESSION['id']=$id;
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="select * from consignment where con_id=$id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$spin=$row['source_pincode'];
	$dpin=$row['des_pincode'];
	$p_add=$row['source_address'];
	$add2=explode(',,', $p_add);
	$d_add=$row['des_address'];
	$add3=explode(',,', $d_add);
	$pr=$row['price'];
	$p_date=$row['pickup_date'];
	$d_date=$row['delivery_date'];
	$we=$row['weight'];
	$pay=$row['payment'];
	$s_m=$row['s_mode'];
	$des=$row['destination'];
	$dname=$row['des_name'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
			.mytable {
			  border-collapse: collapse;
			  width: 70%;
			}

			.mytr {
			  padding-top: 12px;
  			  padding-bottom: 12px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			.myth {
			   padding-top: 12px;
  			  padding-bottom: 12px;
  			  text-align: center;
			}
			.link{
			  background-color: skyblue;
			  color: white;
			  font-size: 20px;
			  padding: 3px 15px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
}
		</style>
<title>Courier Guy</title>
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

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 3px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.disabled {
  pointer-events: none;
  cursor: default;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
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
			<a class="navbar-brand" href="ind1.php"><h1><span class="fa fa-diamond" aria-hidden="true"></span>Courier Guy</h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="ind1.php">Home</a></li>
				<li><a href="consignment1.php">Add New</a></li>
				<li><a href="PriceStore1.php">Pricing</a></li>
				<li><a href="feedback.php">Contact</a></li>
				<li>
					<a href="ind1.php" ><i class="fa fa-lock" aria-hidden="true"></i><?php echo $uname; ?></a>
				</li>
				<li class="dropdown active">
					<a href="ProfileStore.php" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
					<div class="dropdown-content">
						<div class="track-w3ls">
							<a href="ProfileStore.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Profile</a>
						</div>
						<div class="track-w3ls">
							<a href="Address-details.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Address</a>
						</div>
						<div class="track-w3ls">
							<a href="myorder.php"><i class="fa fa-lock" aria-hidden="true"></i>My Consignment</a>
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
<h4 style="color:skyblue; padding-top: 12px; margin-left: 225px; ">Order Deatil of Order ID <?php echo $id; ?></h4>
<center>
<table class="mytable">
	<tr class="mytr">
		<th class="myth">Source Pincode:</th>
		<td width="50%"><?php echo $spin ?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Delivery Pincode</th>
		<td><?php echo $dpin ?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Pickup Address:</th>
		<td><?php
			foreach ($add2 as $abc) {
				echo $abc.'<br/>';
			}
			?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Delivery Addess</th>
		<td><?php
			echo $dname.'<br/>';
			foreach ($add3 as $abc) {
				echo $abc.'<br/>';
			}
			echo $des;
			?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Price:</th>
		<td><?php echo 'Rs. '.$pr ?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Delivery Date:</th>
		<td><?php echo $d_date ?></td>
	</tr>
	<tr class="mytr">
		<th class="myth">Pickup Date</th>
		<td><?php echo $p_date ?></td>
	</tr>
	<tr class="mytr">
			<th class="myth">Weight</th>
			<td><?php echo $we ?></td>
	</tr>
	<tr class="mytr">
			<th class="myth">Speed Mode</th>
			<td><?php echo $s_m ?></td>
	</tr>
	<tr class="mytr">
			<th class="myth">Payment</th>
			<td><?php echo $pay ?></td>
	</tr>
	<tr class="mytr">
		<td></td>
		<!--<td align="center" class="mytr"><a target="_blank" href="generate_receipt.php?id=<?php echo $id; ?>" class="link">Receipt</a></td>-->
		<td align="center" class="mytr"><a target="_blank" href="generate_invoice.php?id=<?php echo $id; ?>" class="link">Invoice</a></td>
	</tr>
	<tr class="mytr">
		<!--<td></td>-->
		<td align="center" class="mytr"><button class="button button2" onclick="window.location = 'myorder.php'">Back</button></td>
		<td align="center" class="mytr"><button class="button button2" onclick="window.location = 'trackcon.php?con=<?php echo $id; ?>'">Track</button></td>
	</tr>
</table>
</center>
<br/>
<br/>
<br/>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>