<?php
	$conn=mysqli_connect("localhost","root","","courier_system");
	$uname=$_POST['username'];
	$pass=md5($_POST['pass1']);
	$sql="update login set password='$pass' where user_name='$uname'";
	if(mysqli_query($conn,$sql))
	{
		header("Location:LoginStore.html");
	}
	else
	{
		$a="Error! password Does not Change. Please, try Again!";
		header("Location:fp1.php?str='$a'");
	}
?>