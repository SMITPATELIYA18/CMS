<?php
	ini_set("display_errors",'Off');
	session_start();
	if(!isset($_SESSION['user_name'])){
		header("Location:index.php");
	}
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	function validate($a)
	{
		$a=trim($a);
		$a=stripslashes($a);
		$a=htmlspecialchars($a);
		return $a;
	}
	$flag=0;
	$flag1=0;
	$add1=validate($_POST['addl_1']);
	$add2=validate($_POST['addl_2']);
	$city=validate($_POST['City']);
	$state=validate($_POST['State']);
	$cou=validate($_POST['Country']);
	$pin=validate($_POST['Pincode']);
	$sql="select * from login where user_name='$uname'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$type=$row['user_type'];
	if($type=="Consumer")
	{
		$v=substr($pin,0,4);
		echo strlen($pin);
		//echo $v." ".$city;
		if(strlen($pin)==6){
			$flag1=1;
			if($city=="Ahmedabad")
			{
				if($v=="3800")
				{	$flag=1;
				}
				else
				{	header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");}
			}
			else if($city=="Amritsar")
			{
				if($v=="1430")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Banglore")
			{
				if($v=="5600")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Chennai")
			{
				if($v=="6000")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Chandigarh")
			{
				if($v=="1600")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Delhi")
			{
				if($v=="1100")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Hyderabad")
			{
				if($v=="5000")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Jaipur")
			{
				if($v=="3020")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Kolkata")
			{
				if($v=="7000")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Mumbai")
			{
				if($v=="4000")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Pune")
			{
				if($v=="4110")
					echo " ";
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Rajkot")
			{
				if($v=="3600")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Surat")
			{
				if($v=="3950")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
			else if($city=="Vadodara")
			{
				if($v=="3900")
					$flag=1;
				else
					header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
			}
		}
		else
			header("Location:Address-details.php?str='Please Enter 6 Digit Pincode'");
	}
	else
	{
		$flag=1;
		$flag1=1;
	}
	

	if($flag==1 && $flag1=1)
	{
		$sql="select * from login where user_name='$uname'";
		$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
		$type=$row['user_type'];
		if($type=='Consumer')
		{
			$sql="update consumer set add_line_1='$add1', add_line_2='$add2', city='$city', state='$state', country='$cou', pin_code='$pin' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
					header("Location:ind1.php");
			}
		}
		else if($type=='Staff')
		{
			$sql="update staff set add_line_1='$add1', add_line_2='$add2', city='$city' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
					header("Location:pbranchstaff.php");
			}
		}
		else if($type=="Delivery Boy")
		{
			$sql="update staff set add_line_1='$add1', add_line_2='$add2', city='$city' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
					header("Location:dDelivery-Boy.php");
			}
		}
	}
	else
		header("Location:Address-details.php?str='Please Choose Valid City and Pincode'");
?>