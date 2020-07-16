<?php
	ini_set("display_errors","Off");
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$e_id=$_POST['e_id'];
	// $job=$_POST['job_city'];
	// $b_id=$_POST['bran_id'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="update branch_staff set change1=1 where e_id=$e_id";
	mysqli_query($conn,$sql);
	header("Location:pbranchstaff.php");
?>