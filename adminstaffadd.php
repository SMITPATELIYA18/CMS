<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$id=$_POST['id'];
	$aa=$_POST['aa_no'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$job=$_POST['job_city'];
	$b_id=$_POST['bran_id'];
	echo $id."  ".$job."  ".$b_id;
	$sql="update branch_staff set job_city='$job', branch_id='$b_id', change1=0 where staff_id=$id";
	mysqli_query($conn,$sql);
	$sql="select * from branch_staff where staff_id='$id'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$eid=$row['e_id'];
	$sql="update staff set aadhar='$aa' where e_id='$eid'";
	mysqli_query($conn,$sql);
	header("Location:adminupdatestaff.php")
?>