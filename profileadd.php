<?php
	session_start();
	ini_set("display_errors",'Off');
	if(!isset($_SESSION['user_name'])){
		header("Location:index.php");
	}
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="select * from login where user_name='$uname'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$type=$row['user_type'];
	function validate($a)
	{
		$a=trim($a);
		$a=stripslashes($a);
		$a=htmlspecialchars($a);
		return $a;
	}
	$flag=0;
	$fname=validate($_POST['f_name']);
	$lname=validate($_POST['l_name']);
	$email=$_POST['email'];
	$mo=validate($_POST['mo_no']);
	$gen=$_POST['Gender'];
	//$aad=$_POST['aa_no']
	if(strlen($mo)==10)
	{
		if(preg_match('/^[0-9]{10}+$/', $mo))
			$flag=1;
		else{
			if($type=='Consumer')
				header("Location:ProfileStore.php?str='Enter A Valid Mobile Number'");
			else if($type=='Staff')
				header("Location:PProfileStore.php?str='Enter A Valid Mobile Number'");
			else if($type=="Delivery Boy")
				header("Location:dProfileStore.php?str='Enter A Valid Mobile Number'");
			else if($type=="Admin")
				header("Location:adminProfile.php?str='Enter A Valid Mobile Number'");
		}
	}
	else
	{
		if($type=='Consumer')
			header("Location:ProfileStore.php?str='Enter A 10 Digit Mobile Number'");
		else if($type=='Staff')
			header("Location:PProfileStore.php?str='Enter A 10 Digit Mobile Number'");
		else if($type=="Delivery Boy")
			header("Location:dProfileStore.php?str='Enter A 10 Digit Mobile Number'");
		else if($type=="Admin")
			header("Location:adminProfile.php?str='Enter A 10 Digit Mobile Number'");
	}
	/*if(strlen($aad)==12)
	{
		if(preg_match('/^[0-9]{12}+$/', $mo))
			$flag1=1;
		else{
			if($type=='Consumer')
				header("Location:ProfileStore.php?str='Enter A Valid Aadhar Number'");
			else if($type=='Staff')
				header("Location:PProfileStore.php?str='Enter A Valid Aadhar Number'");
			else if($type=="Delivery Boy")
				header("Location:dProfileStore.php?str='Enter A Valid Aadhar Number'");
			else if($type=="Admin")
				header("Location:adminProfile.php?str='Enter A Valid Aadhar Number'");
		}
	}
	else
	{
		if($type=='Consumer')
			header("Location:ProfileStore.php?str='Enter A 12 Digit Aadhar Number'");
		else if($type=='Staff')
			header("Location:PProfileStore.php?str='Enter A 12 Digit Aadhar Number'");
		else if($type=="Delivery Boy")
			header("Location:dProfileStore.php?str='Enter A 12 Digit Aadhar Number'");
		else if($type=="Admin")
			header("Location:adminProfile.php?str='Enter A 12 Digit Aadhar Number'");
	}*/
	if($flag==1)
	{
		
		if($type=='Consumer')
		{
			$sql="update login set email='$email' where user_name='$uname'";
			$sql1="update consumer set f_name='$fname', l_name='$lname', mobile_no='$mo', gender='$gen' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
				if(mysqli_query($conn,$sql1))
				{
					header("Location:ind1.php");
				}
			}
		}
		else if($type=='Staff')
		{
			$sql="update login set email='$email' where user_name='$uname'";
			$sql1="update staff set f_name='$fname', l_name='$lname', mobile_no='$mo', gender='$gen' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
				if(mysqli_query($conn,$sql1))
				{
					header("Location:pbranchstaff.php");
				}
			}
		}
		else if($type=="Delivery Boy")
		{
			$sql="update login set email='$email' where user_name='$uname'";
			$sql1="update staff set f_name='$fname', l_name='$lname', mobile_no='$mo', gender='$gen' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
				if(mysqli_query($conn,$sql1))
				{
					header("Location:dDelivery-Boy.php");
				}
			}
		}
		else if($type=="Admin")
		{
			$sql="update login set email='$email' where user_name='$uname'";
			$sql1="update admin set f_name='$fname', l_name='$lname', mobile_no='$mo' where user_name='$uname'";
			if(mysqli_query($conn,$sql))
			{
				if(mysqli_query($conn,$sql1))
				{
					header("Location:adminindex.php");
				}
			}
		}
	}
?>