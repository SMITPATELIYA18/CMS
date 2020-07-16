<?php
	ini_set("display_errors",'Off');
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$sou=$_POST['source1'];
	$dest=$_POST['desti1'];
	$weight=$_POST['weight'];
	$type1=$_POST['type1'];
	$smode=$_POST['smode'];
	$add1=$_POST['source_add'];
	$spin=$_POST['spin_code'];
	$add2=$_POST['dadd_1'].",, ".$_POST['dadd_2'];
	$dpin=$_POST['dpin_code'];
	$named=$_POST['dname'];
	$v=substr($dpin,0,4);
	//echo $v;
	$flag1=2;
	$flag=2;
	//echo $sou." ".$dest;
	if($sou==$dest)
		$flag1=1;
	else{
		if(strlen($dpin)==6){
			//echo "Hii1";
			if($dest=="Ahmedabad")
			{
				if($v=="3800")
				{	$flag=1;
				}
				else
				{	$flag=0;
				}
			}
			else if($dest=="Amritsar")
			{
				if($v=="1430")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Banglore")
			{
				if($v=="5600")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Chennai")
			{
				if($v=="6000")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Chandigarh")
			{
				if($v=="1600")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Delhi")
			{
				if($v=="1100")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Hyderabad")
			{
				if($v=="5000")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Jaipur")
			{
				if($v=="3020")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Kolkata")
			{
				if($v=="7000")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Mumbai")
			{
				if($v=="4000")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Pune")
			{
				if($v=="4110")
					echo " ";
				else
					$flag=0;
			}
			else if($dest=="Rajkot")
			{
				if($v=="3600")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Surat")
			{
				if($v=="3950")
					$flag=1;
				else
					$flag=0;
			}
			else if($dest=="Vadodara")
			{
				if($v=="3900")
					$flag=1;
				else
					$flag=0;
			}
		}
		else{
			$flag=0;
			echo "Hii";
		}
	}
	echo $flag." ".$flag1;
	if($flag==0)
	{
		header("Location:consignment1.php?source=$sou&des=$dest&weight=$weight&wtype=$type1&smode=$smode&add2=$add2&dpin=$dpin&ddname=$named&str='Enter Valid Pincode'");
	}
	else if($flag1==1)
	{
		header("Location:consignment1.php?source=$sou&des=$dest&weight=$weight&wtype=$type1&smode=$smode&add2=$add2&dpin=$dpin&ddname=$named&str='Enter Valid Destination City'");
	}
?>
<!DOCTYPE html>
<html>
<head>
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
				<li class="active"><a href="consignment1.php">Consignment</a></li>
				<li><a href="PriceStore1.php">Pricing</a></li>
				<li><a href="feedback.php">Contact</a></li>
				<li>
					<a href="ind1.php" ><i class="fa fa-lock" aria-hidden="true"></i><?php echo $uname; ?></a>
				</li>
				<li class="dropdown">
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
<br>
<br>
<br>
   <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Consignment</h2>
                </div>
				
                <div class="card-body">
                    <form method="post" action="addconsignment.php">
						<div class="form-row">
                            <div class="name">Source</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="source1" value="<?php echo $sou; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Destination</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="des1" value="<?php echo $dest; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Weight</div>
                            <div class="value">
								<div class="row row-refine">
									<div class="col-9">
                                        <div class="input-group-desc">
                                            <input readonly class="input--style-5" type="text" name="weight" required value="<?php echo $weight; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
											<div class="input-group-desc">
                                            <input readonly class="input--style-5" type="text" name="wtype" required value="<?php echo $type1; ?>">
											</div>
										</div>
                                    </div>
								</div>
							</div>
						</div>
						<div class="form-row">
                            <div class="name">Speed Mode</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="smode" value="<?php echo $smode; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Source Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="aadd_1" value="<?php echo $add1; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Source Pincode</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="spin" value="<?php echo $spin; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">To.</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="ddname" required value="<?php echo $named;	?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Destination Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="dadd_1" value="<?php echo $add2; ?>">
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Destination Pin Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <input readonly class="input--style-5" type="text" name="dpin" value="<?php echo $dpin; ?>">
                                </div>
                            </div>
                        </div>
                        <div>
							<a href="consignment1.php?source=<?php echo $sou; ?>&des=<?php echo $dest; ?>&weight=<?php echo $weight; ?>&wtype=<?php echo $type1; ?>&smode=<?php echo $smode; ?>&add2=<?php echo $add2; ?>&dpin=<?php echo $dpin; ?>&ddname=<?php echo $named; ?>">Edit Detail</a>
						</div>
						<div style="text-align:right;">
							<button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>