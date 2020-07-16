<?php
	$conn=mysqli_connect("localhost","root","","courier_system");
	function validate($a)
	{
		$a=trim($a);
		$a=stripslashes($a);
		$a=htmlspecialchars($a);
		return $a;
	}
	$uname=$_POST['Username'];
	$password=md5($_POST['pass']);
	$uname=validate($uname);
	$type=$_POST['log'];
	$sql="select * from login where user_name='$uname' and password='$password' and user_type='$type'";
	$result=mysqli_num_rows(mysqli_query($conn,$sql));
	if($result==1){
		session_start();
		$_SESSION["user_name"]=$uname;
		if($type=='Consumer')
			header("Location:ind1.php");
		else if($type=='Staff')
			header("Location:pbranchstaff.php");
		else if($type=='Delivery Boy')
			header("Location:dDelivery-Boy.php");
		else if($type=='Admin')
			header("Location:adminindex.php");
	}
	else{
		//echo "<input type='hidden' name='abc' method='post' value='Please Check Your Password and Username.'></input>";
		$abc="Error! Invalid Login Details";
		header("Location:LoginStore.php?str='$abc'");
		//$_POST['abc']="Please Check Your Password and Username.";
	}
?>