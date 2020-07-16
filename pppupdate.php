<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$o_id=$_POST['order_id'];
	$s_mode=$_POST['s_mode'];
	$weigth=(float)$_POST['weight'];
	$d_date=$_POST['d_date'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="update consignment set s_mode='$s_mode', weight=$weigth, delivery_date='$d_date', verify='Confirm' where con_id=$o_id";
	if(mysqli_query($conn,$sql))
	{
		header("Location:pverify.php");
	}
	else
		echo mysqli_error($conn);
?>