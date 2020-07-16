<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$o_id=$_GET['id'];
	//$s_mode=$_POST['s_mode'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="update consignment set verify='Confirm' where con_id=$o_id";
	if(mysqli_query($conn,$sql))
	{
		header("Location:pverify.php");
	}
	else
		echo mysqli_error($conn);
?>