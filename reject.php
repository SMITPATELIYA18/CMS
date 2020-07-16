<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$type=$_GET['type'];
	$id=$_GET['id'];
	if($type=="staff")
	{
		$sql="update branch_staff set change1=0 where staff_id='$id'";
		mysqli_query($conn,$sql);
		header("Location:adminupdatestaff.php");
	}
	else if($type=="delivery")
		{
		$sql="update delivery_boy set change1=0 where delivery_id='$id'";
		mysqli_query($conn,$sql);
		header("Location:adminupdatestaff.php");
	}
?>