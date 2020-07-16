<?php
	ini_set("display_errors","Off");
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="select * from staff where user_name='$uname'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$e_id=$row['e_id'];
	$aa=$row['aadhar'];
	$sql="select * from delivery_boy where e_id=$e_id";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$job=$row['job_city'];
	$v_no=$row['vehicle_no'];
	$v_type=$row['vehicle_type'];
	$b_id=$row['branch_id'];
	//$aa=$row['aadhar'];
	$sql="select * from branch where branch_id='$b_id'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$b_add=$b_id." <b>Address:</b> ".$row['branch_add'];
?>
<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
<title>Delivery-Boy</title>
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
<script src="drop.js"></script>
<script>
		$(function() {
		
			
			$("#job_city").change(function() {
				$("#bran_id").load("text/id/" + $(this).val() + ".txt");
			});
		});
	</script>
<!-- /js files -->
<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
        <<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="dDelivery-Boy.php">Home</a></li>
				<li><a href="dpickup.php">Pick-Up Consgt.</a></li>
				<li><a href="dverify.php">verify-Consgt.</a></li>
				<li><a href="ddelivery.php">Delivery-Consgt.</a></li>
				<li class="active"><a href="dDeliveryFrom.php">Job Profile</a></li>
				<li>
					<a href="dDelivery-Boy.php" ><i class="fa fa-lock" aria-hidden="true"></i><?php echo $uname; ?></a>
				</li>
				<li class="dropdown">
					<a href="dProfileStore.php" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
					<div class="dropdown-content">
						<div class="track-w3ls">
							<a href="dProfileStore.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Profile</a>
						</div>
						<div class="track-w3ls">
							<a href="dAddress-details.php"><i class="fa fa-lock" aria-hidden="true"></i>Update Address</a>
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
<br>
<br>
<br>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Delivery-Boy</h2>
                </div>
				<div class="card-body">
                    <form method="POST" action="dDeliveryProAdd.php">
					<div class="form-row">
                            <div class="name">User-Name:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="User_Name" value="<?php echo $uname;  ?>">
                                </div>
                            </div>
                        </div>
					<div class="form-row">
                            <div class="name">Emplyee ID:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="e_id" value="<?php echo $e_id;  ?>">
                                </div>
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="name">Job City</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="job" value="<?php echo $job;  ?>">
                                </div>
                            </div>
                        </div>
					<!-- <div class="form-row">
                            <div class="name">Job City</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="job_city" id="job_city">
                                            <option selected="" value="Default" disabled="disabled">Choose option</option>
                                            <option value="Ahmedabad" <?php// if($job=='Ahmedabad'){	echo 'selected'; }	?>>Ahmedabad</option>
											<option value="Amritsar" <?php// if($job=='Amritsar'){	echo 'selected'; }	?>>Amritsar</option>
											<option value="Banglore" <?php// if($job=='Banglore'){	echo 'selected'; }	?>>Banglore</option>
											<option value="Chennai" <?php// if($job=='Chennai'){	echo 'selected'; }	?>>Chennai</option>
											<option value="Chandigarh" <?php //if($job=='Chandigarh'){	echo 'selected'; }	?>>Chandigarh</option>
											<option value="Delhi" <?php// if($job=='Delhi'){	echo 'selected'; }	?>>Delhi</option>
											<option value="Hyderabad" <?php// if($job=='Hyderabad'){	echo 'selected'; }	?>>Hyderabad</option>
											<option value="Jaipur" <?php// if($job=='Jaipur'){	echo 'selected'; }	?>>Jaipur</option>
											<option value="Kolkata" <?php// if($job=='Kolkata'){	echo 'selected'; }	?>>Kolkata</option>
											<option value="Mumbai" <?php// if($job=='Mumbai'){	echo 'selected'; }	?>>Mumbai</option>
											<option value="Pune" <?php// if($job=='Pune'){	echo 'selected'; }	?>>Pune</option>
											<option value="Rajkot" <?php// if($job=='Rajkot'){	echo 'selected'; }	?>>Rajkot</option>
											<option value="Surat" <?php// if($job=='Surat'){	echo 'selected'; }	?>>Surat</option>
											<option value="Vadodara" <?php// if($job=='Vadodara'){	echo 'selected'; }	?>>Vadodara</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
					<div class="form-row">
                            <div class="name">Vehicle-Number:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="Vehicle_No" value="<?php echo $v_no;  ?>">
                                </div>
                            </div>
                        </div>
					<div class="form-row">
                            <div class="name">Vehicle-Type:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="Vehicle_Type" value="<?php echo $v_type;  ?>">
                                </div>
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="name">Aadhar No:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="aa_no" required value="<?php echo $aa; ?>">
                                </div>
                            </div>
                        </div>
					<!-- <div class="form-row">
                            <div class="name">Branch ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="bran_id" id="bran_id" onchange="validate('b_address',this.value)">
                                            <option selected="" value="Default" disabled="disabled">Choose option</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
					<div class="form-row">
                            <div class="name">Branch Detail:</div>
                            <div class="value">
                                <div class="input-group">
                                    <p id="b_address"><?php echo $b_add;	?></p>
                                </div>
                            </div>
                        </div>
					<div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
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
<!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
<script>
			function validate(str,value)
			{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById(str).innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "check.php?a="+str+"&value="+value , true);
				xmlhttp.send();
			}
	</script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>