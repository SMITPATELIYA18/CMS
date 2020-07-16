<?php
	ini_set("display_errors","Off");
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$e_id=$_POST['e_id'];
	$job=$_POST['job_city'];
	$b_id=$_POST['bran_id'];
	$no=$_POST['Vehicle_No'];
	$v_type=$_POST['Vehicle_Type'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="update delivery_boy set change1=1 where e_id='$e_id'";
	mysqli_query($conn,$sql);
	header("Location:dDelivery-Boy.php");
?>