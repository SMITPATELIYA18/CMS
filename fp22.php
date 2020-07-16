<?php
	$conn=mysqli_connect("localhost","root","","courier_system");
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
	$uname1=$_POST['username'];
	$email=$_POST['email1'];
	$sql="select * from forgot_password where user_name='$uname1'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$flag1=0;
	$flag2=0;
	for($i=1;$i<=3;$i++)
	{
		if($row["que$i"]==$que1)
		{
			//echo "que$i<br>";
			if($row["ans$i"]==$ans1)
			{
				//echo "an1<br>";
				$flag1=1;
				break;
			}
		}
	}
	for($i=1;$i<=3;$i++)
	{
		if($row["que$i"]==$que2)
		{
			//echo "que$i<br>";
			if($row["ans$i"]==$ans2)
			{
				//echo "an2";
				$flag2=1;
				break;
			}
		}
	}
	//echo $flag1;
	if($flag1==1 && $flag2==1)
	{
		header("Location:new_pass.php?str=$uname1");
	}
	else
	{
		$str="Error! Your Answer is Not Match. Please try Again";
		header("Location:fp1.php?str='$str'");
	}
?>