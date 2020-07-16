<?php
	$conn=$conn=mysqli_connect("localhost","root","","courier_system");
	function validate($a)
	{
		$a=trim($a);
		$a=stripslashes($a);
		$a=htmlspecialchars($a);
		return $a;
	}
	$type=$_POST['log'];
	$des=$_POST['feedback'];
	$fname=$_POST['F_Name'];
	$lname=$_POST['L_Name'];
	$email=$_POST['email'];
	$sql="insert into feedback(f_type,description,f_name,l_name,email) values('$type','$des','$fname','$lname','$email')";
	if(!mysqli_query($conn,$sql))
		mysqli_error($conn);
	else
	{
		if(isset($_SESSION['user_name']))
			header("Location:ind1.php");
		else
			header("Location:index.php");
	}