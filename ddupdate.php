<?php
	require_once("Track.php");
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	$id=$_SESSION['id'];
	$sql="SELECT * FROM consignment where con_id=$id";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$city1=$row['source'];
	$city2=$row['destination'];
	$city=$row['source'];
	$t_o=unserialize($row['track']);
	$t_o->add($city,'Payment Succesfull and Pickup Completed.');
	$wei=$_POST['weight'];
	$smode=$_POST['s_mode'];
	$t_o=serialize($t_o);
	//echo $city1."  ".$city2;


	/*$sql="select * from city where city1='$city1' and city2='$city2'";
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
	//echo $km." ";
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
	if($smode=="Normal")
		$price=$fair*$km*$wei;
	else if($smode=="Speed")
		$price=$fair*$km*$wei*1.9;
	$p=floor($price+0.5);
	echo $p."  ".$t_o;*/
	$sql="UPDATE consignment SET delivery_id=Null, payment='Confirm', weight=$wei, s_mode='$smode', track='$t_o' where con_id=$id";
	if(mysqli_query($conn,$sql))
	{	header("Location:dDelivery-Boy.php");
		echo "Hii";
	}
	else
		echo mysqli_error($conn);
?>