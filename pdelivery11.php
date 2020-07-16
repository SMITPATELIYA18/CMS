<?php
	include("Track.php");
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$id=$_SESSION['id'];
	$des=$_POST['des'];
	$city=$_POST['city'];
	$d_id=$_POST['d_id'];
	//echo $city;
	$conn=mysqli_connect("localhost","root","","courier_system");
	$sql="select * from staff where user_name='$uname'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$emp_id=$row['e_id'];
	//echo $emp_id;
	$sql="select * from branch_staff where e_id='$emp_id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$b_id=$row['branch_id'];
	//echo $b_id;
	$sql="select * from branch where city='$city' and type='Main'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$ccity=$row['branch_id'];
	//echo $ccity;
	$sql="select * from consignment where con_id=$id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$o_d=unserialize($row['track']);
	$o_d->add($city,$des);
	$abc=serialize($o_d);
	echo $ccity;
	$sql="update consignment set track='$abc', current='$ccity', delivery_id='$d_id' where con_id=$id";
	if(mysqli_query($conn,$sql))
	{
		// if($des='Package Deliver')
		// {
		// 	$sql="update consignment set track='$abc', current=' ' where con_id=$id";
		// 	if(!mysqli_query($conn,$sql))
		// 		echo mysqli_error($conn);
		// }
		header("Location:pdelivery.php");
	}
	else
		echo mysqli_error($conn);

?>