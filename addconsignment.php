<?php	
	ini_set("display_errors",'Off');
	session_start();
	if(!isset($_SESSION['user_name']))
		header("Location:index.php");
	$uname=$_SESSION['user_name'];
	$spin=$_POST['spin'];
	// $v1=$_POST['source1'];
	// $v=substr($spin,0,4);
	//echo $v;
	// if($v1=="Ahmedabad")
	// {
	// 	if($v=="3800")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Amritsar")
	// {
	// 	if($v=="1430")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Banglore")
	// {
	// 	if($v=="5600")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Chennai")
	// {
	// 	if($v=="6000")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Chandigarh")
	// {
	// 	if($v=="1600")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Delhi")
	// {
	// 	if($v=="1100")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Hyderabad")
	// {
	// 	if($v=="5000")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Jaipur")
	// {
	// 	if($v=="3020")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Kolkata")
	// {
	// 	if($v=="7000")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Mumbai")
	// {
	// 	if($v=="4000")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Pune")
	// {
	// 	if($v=="4110")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Rajkot")
	// {
	// 	if($v=="3600")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Surat")
	// {
	// 	if($v=="3950")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	// else if($v1=="Vadodara")
	// {
	// 	if($v=="3900")
	// 		echo " ";
	// 	else
	// 		header("Location:consignment1.php?str='Please Choose Valid Source City'");
	// }
	$sou=$_POST['source1'];
	//echo $sou;
	$named=$_POST['ddname'];
	$des=$_POST['des1'];
	$wei=(double)$_POST['weight'];
	$wtype=$_POST['wtype'];
	$smode=$_POST['smode'];
	$souadd=$_POST['aadd_1'];
	$desadd=$_POST['dadd_1'];
	$dpin=$_POST['dpin'];
	$conn=mysqli_connect("localhost","root","","courier_system");
	//Price Calculate
	$sql="select * from city where city1='$sou' and city2='$des'";
	$result=mysqli_query($conn,$sql);
	$km=0;
	if(mysqli_num_rows($result)==1)
	{
		$row=mysqli_fetch_assoc($result);
		$km=$row['km'];
	}
	else
	{
		$sql="select * from city where city1='$sou' and city2='$des'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_assoc($result);
			$km=$row['km'];
		}
	}
	echo $km."km<br/>";
	$sql="select * from price";
	$id;
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
	echo $id."id<br/>";
	$sql="select * from price where price_id='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$fair=0.0;
	$fair=$row['price'];
	if($wtype=="gm")
		$wei=$wei/1000;
	$price=0;
	if($smode=="Normal")
		$price=$fair*$km*$wei;
	else if($smode=="Speed")
		$price=$fair*$km*$wei*1.9;
	$price1=floor($price+0.5);
	echo $price1."Price<br/>";
	date_default_timezone_set("Asia/Calcutta");
	$cdate=date('Y-m-d');
	$sql="select * from branch where city='".$_POST['source1']."'";
	$result=mysqli_query($conn,$sql);
	$no=mysqli_num_rows($result);
	$i=0;
	$sou_id='';
	while($row=mysqli_fetch_array($result))
	{
		$sou_id=$row['branch_id'];
		if(0==$row['addCon'])
		{
			$sou_id=$row['branch_id'];
			break;
		}
		else{
			$i++;
		}
	}
	if($i==$no)
	{
		$aid=substr($sou_id,0,6);
		for($j=1;$j<=$i;$j++)
		{
			$abc=$aid.$j;
			//echo $abc;
			$sql="update branch set addCon=0 where branch_id='$abc'";
			mysqli_query($conn,$sql);
		}
		$sou_id=$aid.'1';
		$sql="update branch set addCon=1 where branch_id='$sou_id'";
		mysqli_query($conn,$sql);
	}
	else{
		$sql="update branch set addCon=1 where branch_id='$sou_id'";
		mysqli_query($conn,$sql);
	}
	$sql="select * from branch where city='".$_POST['des1']."' and type='Main'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	// while($row=mysqli_fetch_array($result))
	// {
	$des_id=$row['branch_id'];
	// 	//echo $sou_id;
	// }
	echo $des_id;
	$a=strtotime('+1 day');
	$pdate=date('Y-m-d',$a);
	echo $pdate;
	if($km<500)
	{
		if($smode=='Normal')
		{
			$a=strtotime('+3 day');
			$ddate=date('Y-m-d',$a);
		}
		else if($smode=="Speed")
		{
			$a=strtotime('+2 day');
			$ddate=date('Y-m-d',$a);
		}
	}
	else if($km>500 && $km<1000)
	{
		if($smode=='Normal')
		{
			$a=strtotime('+6 day');
			$ddate=date('Y-m-d',$a);
		}
		else if($smode=="Speed")
		{
			$a=strtotime('+2 day');
			$ddate=date('Y-m-d',$a);
		}
	}
	else if($km>1000 && $km<1500)
	{
		if($smode=='Normal')
		{
			$a=strtotime('+9 day');
			$ddate=date('Y-m-d',$a);
		}
		else if($smode=="Speed")
		{
			$a=strtotime('+5 day');
			$ddate=date('Y-m-d',$a);
		}
	}
	else if($km>1500 && $km<2000)
	{
		if($smode=='Normal')
		{
			$a=strtotime('+12 day');
			$ddate=date('Y-m-d',$a);
		}
		else if($smode=="Speed")
		{
			$a=strtotime('+7 day');
			$ddate=date('Y-m-d',$a);
		}
	}
	else if($km>2000)
	{
		if($smode=='Normal')
		{
			$a=strtotime('+15 day');
			$ddate=date('Y-m-d',$a);
		}
		else if($smode=="Speed")
		{
			$a=strtotime('+8 day');
			$ddate=date('Y-m-d',$a);
		}
	}
	echo $ddate;
	//echo $sou_id."<br/>";
	$sql="select * from delivery_boy where branch_id='".$sou_id."'";
	$result=mysqli_query($conn,$sql);
	$no=0;
	$no=mysqli_num_rows($result);
	$i=0;
	$d_id=0;
	while($row=mysqli_fetch_array($result))
	{
		$d_id=$row['delivery_id'];
		if(0==$row['assiCon'])
		{
			$d_id=$row['delivery_id'];
			echo $d_id."<br/>";
			break;
		}
		else{
			$i++;
		}
		//echo $d_id."<br/>";
	}
	//echo $i."   ".$no."<br/>";
	if($i==$no)
	{
		//echo "Hii</br>";
		$sql="select * from delivery_boy where branch_id='".$sou_id."'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			//echo "Hii</br>";
			$sql="update delivery_boy set assiCon=0 where delivery_id='$d_id'";
			mysqli_query($conn,$sql);
		}
		$sql="select * from delivery_boy where branch_id='".$sou_id."'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$d_id=$row['delivery_id'];
		//echo $d_id;
		$sql="update delivery_boy set assiCon=1 where delivery_id='$d_id'";
		mysqli_query($conn,$sql);
		/*$aid=substr($sou_id,0,6);
		for($j=1;$j<=$i;$j++)
		{
			$abc=$aid.$j;
			//echo $abc;
			$sql="update branch set addCon=0 where branch_id='$abc'";
			mysqli_query($conn,$sql);
		}
		$d_id=$aid.'1';
		$sql="update delivery_boy set assiCon=1 where delivery_id='$d_id'";
		mysqli_query($conn,$sql);*/
	}
	else{
		$sql="update delivery_boy set assiCon=1 where delivery_id='$d_id'";
		mysqli_query($conn,$sql);
	}
	//echo $sou_id."   ".$d_id;
	echo $d_id;
	$sou=$_POST['source1'];
	$des=$_POST['des1'];
	require_once('Track.php');
	$t_o=new Track($sou);
	$o_d=serialize($t_o);
	$sql="insert into consignment(user_name,source,source_address,source_pincode,des_name,destination,des_address,des_pincode,price,cdate,branch_sou_id,branch_des_id,pickup_date,delivery_id,delivery_date,weight,s_mode,payment,verify,track,current) values('$uname','$sou','$souadd','$spin','$named','$des','$desadd','$dpin',$price1,'$cdate','$sou_id','$des_id','$pdate',$d_id,'$ddate',$wei,'$smode','Pending','Pending','$o_d','$sou_id')";
	if(mysqli_query($conn,$sql))
	{
		$sql="SELECT * FROM consignment where user_name='$uname' and price=$price1 and cdate='$cdate'";
		$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
		$_SESSION['c_id']=$row['con_id'];
		header("Location:ind1.php");
	}
	else
		echo mysqli_error($conn);
?>	