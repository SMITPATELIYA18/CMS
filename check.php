<html>
	<head>
		<style>
			.red{
				color:red;
			}
			.green{
				color:green;
			}
		</style>
	</head>
</html>
<?php
	
	$conn=mysqli_connect("localhost","root","","courier_system");
	$a=$_GET['a'];
	$v=$_GET['value'];
	if($a=="uname")
	{
		if(strlen($v)<4)
			echo "<span class='red'>Enter 3+ Chracter.</span>";
		else{
			$sql="select * from login where user_name='$v'";
			if(mysqli_num_rows(mysqli_query($conn,$sql))==1)
				echo "<span class='red'>User Name is Already Regisred</span>";
			else
				echo "<span class='green'>User Name is Valid</span>";
		}
	}
	else if($a=="pass1")
	{
		if(strlen($v)<8)
			echo "<span class='red'>Enter 8+ character</span>";
	}
	else if($a=="email")
	{
		if(filter_var($v, FILTER_VALIDATE_EMAIL)){
			$sql="select * from login where email='$v'";
			if(mysqli_num_rows(mysqli_query($conn,$sql))==1)
				echo "<span class='red'>Email is Registered</span>";
		}
		else
			echo "<span class='red'>Enter a Valid Email</span>";
	}
	else if($a=="pass2")
	{
		$v1=$_GET['value1'];
		//echo $v1;
		if($v==$v1)
			echo "<span class='green'>Password is Matched</span>";
		else
			echo "<span class='red'>Password is not Match.</span>";
	}
	else if($a=="pin_code")
	{
		if(strlen($v)==6)
		{
			if(preg_match('/^([0-9]{6})+$/', $v))
			{
				$v1=$_GET['value1'];
				$v=substr($v,0,4);
				if($v1=="Ahmedabad")
				{
					if($v=="3800")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Ahmedabad Like 3800XX</span>";
				}
				else if($v1=="Amritsar")
				{
					if($v=="1430")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Amritsar Like 1430XX</span>";
				}
				else if($v1=="Banglore")
				{
					if($v=="5600")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Banglore Like 5600XX</span>";
				}
				else if($v1=="Chennai")
				{
					if($v=="6000")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Chennai Like 6000XX</span>";
				}
				else if($v1=="Chandigarh")
				{
					if($v=="1600")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Chandigarh Like 1600XX</span>";
				}
				else if($v1=="Delhi")
				{
					if($v=="1100")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Delhi Like 1100XX</span>";
				}
				else if($v1=="Hyderabad")
				{
					if($v=="5000")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Hyderabad Like 5000XX</span>";
				}
				else if($v1=="Jaipur")
				{
					if($v=="3020")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Jaipur Like 3020XX</span>";
				}
				else if($v1=="Kolkata")
				{
					if($v=="7000")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Kolkata Like 7000XX</span>";
				}
				else if($v1=="Mumbai")
				{
					if($v=="4000")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Mumbai Like 4000XX</span>";
				}
				else if($v1=="Pune")
				{
					if($v=="4110")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Pune Like 4110XX</span>";
				}
				else if($v1=="Rajkot")
				{
					if($v=="3600")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Rajkot Like 3600XX</span>";
				}
				else if($v1=="Surat")
				{
					if($v=="3950")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Surat Like 3950XX</span>";
				}
				else if($v1=="Vadodara")
				{
					if($v=="3900")
						echo " ";
					else
						echo "<span class='red'>Pin Code for Vadodara Like 3900XX</span>";
				}
			}
			else
				echo "<span class='red'>Enter Valid Pin Code</span>";
		}
		else
		{
			echo "<span class='red'>Enter a 6 Digit Pin Code.</span>";
		}
	}
	else if($a=="mo_no")
	{
		if(strlen($v)==10)
		{
			if(preg_match('/^[0-9]{10}+$/', $v))
				echo " ";
			else
				echo "<span class='red'>Enter Valid Mobile Number</span>";
		}
		else
		{
			echo "<span class='red'>Enter a 10 Digit Mobile Number.</span>";
		}
	}
	else if($a="b_address")
	{
		$conn=mysqli_connect("localhost","root","","courier_system");
		$sql="select * from branch where branch_id='$v'";
		$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
		$b_add=$row['branch_add'];
		$b_id=$row['branch_id'];
		echo $b_id." <b>Address:</b> ".$b_add;
	}
?>