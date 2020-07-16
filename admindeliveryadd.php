<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$id=$_POST['id'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$job=$_POST['job_city'];
	$b_id=$_POST['bran_id'];
	$vno=$_POST['Vehicle_No'];
	$vty=$_POST['Vehicle_Type'];
	$aa=$_POST['aa_no'];
	echo $job."  ".$b_id."  ".$vno." ".$vty."  ".$id;
	$sql="update delivery_boy set job_city='$job', vehicle_no='$vno', vehicle_type='$vty', branch_id='$b_id', change1=0 where delivery_id=$id";
	if(!mysqli_query($conn,$sql))
		mysqli_error($conn);
	$sql="select * from delivery_boy where delivery_id='$id'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$eid=$row['e_id'];
	$sql="update staff set aadhar='$aa' where e_id='$eid'";
	mysqli_query($conn,$sql);
	header("Location:adminupdatestaff.php")
?>