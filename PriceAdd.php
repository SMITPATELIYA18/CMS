<?php
	$conn=mysqli_connect("localhost","root","","courier_system");
	$city1=$_POST['source'];
	$city2=$_POST['destination'];
	$wei=(float)$_POST['weight'];
	$ty1=$_POST['type1'];
	$mode=$_POST['smode'];
	$sql="select * from city where city1='$city1' and city2='$city2'";
	$result=mysqli_query($conn,$sql);
	$km=0;
	if(mysqli_num_rows($result)==1)
	{
		$row=mysqli_fetch_assoc($result);
		$km=$row['km'];
	}
	else
	{
		$sql="select * from city where city1='$city2' and city2='$city1'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_assoc($result);
			$km=$row['km'];
		}
	}
	$sql="select * from price";
	$id=0;
	$result=mysqli_query($conn,$sql);
	while($raw=mysqli_fetch_assoc($result))
	{
		$sou=(int)$raw['source'];
		$des=(int)$raw['destination'];
		if(($sou<=$km)&&($des>=$km)){
			$id=$raw['price_id'];
			break;
		}
	}
	$sql="select * from price where price_id='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$fair=0.0;
	$fair=$row['price'];
	if($ty1=="gm")
		$wei=$wei/1000;
	$price=0;
	if($mode=="Normal")
		$price=$fair*$km*$wei;
	else if($mode=="Speed")
		$price=$fair*$km*$wei*1.9;
	$p=floor($price+0.5);
	session_start();
	if($city1==$city2)
	{
		$str="Please Enter Valid City.";
		if(isset($_SESSION['user_name']))
			header("Location:PriceStore1.php?str='$str'");
		else
			header("Location:PriceStore.php?str='$str'");
	}
	else{
	if(isset($_SESSION['user_name']))
		header("Location:PriceStore1.php?km=$p");
	else
		header("Location:PriceStore.php?km=$p");
	}
?>