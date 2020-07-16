<?php
	ini_set("display_errors",'Off');
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$id=$_GET['con'];
	$str=$_GET['str'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="select * from consignment where con_id=$id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$abc=base64_decode($row['receipt']);
	//echo $row['receipt'];
	header("Content-type:application/pdf");
	echo $abc;
	// header("Content-Disposition:attachment;filename=$id.pdf");
	// // echo $row['receipt'];
	// if($str=='receipt')
	// 	echo $row['receipt'];
	// else if($str=='invoice')
	// 	echo $row['invoice'];

?>
