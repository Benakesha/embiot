<?php
	session_start();
	include "hotels_db.php";

	if(isset($_POST['btnSubmit'])){
		$data=$_POST['mobileNum'];
		$mobileno=strtok($data,' ');
		$mobilenum=stripslashes($mobileno);
		$mobilenum=mysqli_real_escape_string($conn,$mobilenum);

		$sql="SELECT * FROM daily_users WHERE MobileNo=$mobilenum";
		$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		while ($row=mysqli_fetch_assoc($res)) {
			
			$UserName=$row['UserName'];
			$MobileNo=$row['MobileNo'];

			setcookie('UserName',$UserName,time()+60*60*7);
			setcookie('MobileNo',$MobileNo,time()+60*60*7);
			$_SESSION['UserName']=$UserName;
			$_SESSION['MobileNo']=$MobileNo;


		}
		header('location: hotelMaster.php?Page=Home');
	}

?>