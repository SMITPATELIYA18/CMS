<?php
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
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
	$que1=($_POST['que1']);
	$ans1=md5(validate($_POST['ans1']));
	$que2=$_POST['que2'];
	$ans2=md5(validate($_POST['ans2']));
	$que3=$_POST['que3'];
	$ans3=md5(validate($_POST['ans3']));
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="update forgot_password set que1='$que1', que2='$que2', que3='$que3', ans1='$ans1', ans2='$ans2', ans3='$ans3' where user_name='$uname'";
	mysqli_query($conn,$sql);
	setcookie("firsttime","yse",time()-0);
	if($type=='Consumer')
		header("Location:ind1.php");
	else if($type=='Staff')
		header("Location:pbranchstaff.php");
	else if($type=='Delivery Boy')
		header("Location:dDelivery-Boy.php");
?>