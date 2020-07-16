<?php
	$conn=mysqli_connect("localhost","root","","courier_system");
	$flag1=0;
	$flag2=0;
	$flag3=0;
	$flag4=0;
	$type=$_POST['type'];
	$uname=$_POST['username'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	//echo $uname." ".$email." ".$pass1." ".$pass2;
	//echo strlen($uname);
	if(strlen($uname)<4){
		
		//$abc='Enter Username Contain 3+ character';
		//echo $abc;
		header("Location:Signup1.php?str='Enter Username Contain 3+ character'");
	}
	else{
		$sql="select * from login where user_name='$uname'";
		if(mysqli_num_rows(mysqli_query($conn,$sql))==1)
			header("Location:Signup1.php?str='User Name is Already Regisred'");
		else{
			$flag1=1;
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$sql="select * from login where email='$email'";
				if(mysqli_num_rows(mysqli_query($conn,$sql))==1)
					header("Location:Signup1.php?str='Email is Registered'");
				else{
					$flag2=1;
					if(strlen($pass1)<8){
						header("Location:Signup1.php?str='Enter 8+ character Password'");
					}
					else{
						$flag3=1;
						if($pass1==$pass2)
							$flag4=1;
						else
							header("Location:Signup1.php?str='Password is not Match.'");	
					}
				}
			}
			else{
				header("Location:Signup1.php?str='Enter a Valid Email'");
			}
		}	
	}
	
	
	
	


	if($flag1==1 && $flag2==1 && $flag3==1 && $flag4==1)
	{	//header("Location:signup.php?type='$type'&username='$uname'&pass1='$pass1'&email='$email'");
		//echo "hii";
		$conn=mysqli_connect("localhost","root","","courier_system");
		function validate($a)
		{
			$a=trim($a);
			$a=stripslashes($a);
			$a=htmlspecialchars($a);
			return $a;
		}
		$type=$_POST['type'];
		$uname=$_POST['username'];
		$uname=validate($uname);
		$pass=md5($_POST['pass1']);
		echo $type."  ".$uname."  ".$pass."  ";
		if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$email=$_POST['email'];
		}
		else{}
		$sql="insert into login(user_name,password,user_type,email) values('$uname','$pass','$type','$email')";
		if(mysqli_query($conn,$sql))
		{
		}
		else{}
		
		if($type=="Consumer")
		{
			$sql1="insert into consumer(user_name,f_name,l_name,gender,mobile_no,add_line_1,add_line_2,city,state,country,pin_code) values('$uname','','','','','','','','','','')";
			mysqli_query($conn,$sql1);
			$sql1="insert into forgot_password(user_name,que1,ans1,que2,ans2,que3,ans3) values('$uname','','','','','','')";
			mysqli_query($conn,$sql1);
			setcookie("firsttime","yse");
			$abc="Signup Are Successful";
			header("Location:LoginStore.php?str='$abc'");
		}
		else if($type=="Staff")
		{
			$sql1="insert into staff(user_name,f_name,l_name,mobile_no,gender,add_line_1,add_line_2,city) values('$uname','','','','','','','')";
			mysqli_query($conn,$sql1);
			$sql14="select * from staff where user_name='$uname'";
			$result=mysqli_query($conn,$sql14);
			$row=mysqli_fetch_assoc($result);
			$e_id=$row['e_id'];
			$sql12="insert into branch_staff(e_id,job_city) values('$e_id','')";
			mysqli_query($conn,$sql12);
			$sql1="insert into forgot_password(user_name,que1,ans1,que2,ans2,que3,ans3) values('$uname','','','','','','')";
			mysqli_query($conn,$sql1);
			setcookie("firsttime","yse");
			$abc="Signup Are Successful";
			header("Location:LoginStore.php?str='$abc'");
		}
		else if($type="Delivery Boy")
		{
			echo "HII";
			$sql1="insert into staff(user_name,f_name,l_name,mobile_no,gender,add_line_1,add_line_2,city) values('$uname','','','','','','','')";
			mysqli_query($conn,$sql1);
			$sql1="select * from staff where user_name='$uname'";
			$result=mysqli_query($conn,$sql1);
			$row=mysqli_fetch_assoc($result);
			$e_id=$row['e_id'];
			$sql1="insert into delivery_boy(e_id,job_city,vehicle_no,vehicle_type) values('$e_id','','','')";
			if(!mysqli_query($conn,$sql1))
				mysqli_error($conn);
			$sql1="insert into forgot_password(user_name,que1,ans1,que2,ans2,que3,ans3) values('$uname','','','','','','')";
			mysqli_query($conn,$sql1);
			setcookie("firsttime","yse");
			$abc="Signup Are Successful";
			header("Location:LoginStore.php?str='$abc'");
		}
	}
?>