<?php
	include "hotels_db.php";
	session_start();
	
	$MobileNo=$_SESSION['MobileNo'];
	$MobileNo=stripslashes($MobileNo);
	$MobileNo=mysqli_real_escape_string($conn,$MobileNo);

	$itemName=$_POST['itemname'];
	$itemName=stripslashes($itemName);
	$itemName=mysqli_real_escape_string($conn,$itemName);

	$qty=$_POST['qty'];
	$qty=stripslashes($qty);
	$qty=mysqli_real_escape_string($conn,$qty);

	date_default_timezone_set('Asia/Kolkata');

	$current_date=date('Y/m/d H:m:s A');
	
	$sql="SELECT * FROM item_details WHERE ItemName='$itemName'";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_assoc($res)){

		$price=$row['Price'];
		$amount=$price * $qty;
		$amount=stripslashes($amount);
		$amount=mysqli_real_escape_string($conn,$amount);
	}
	//die(date('Hi'));
	if(date('H') >=7 && date('H') < 12 ){
		$sql1="INSERT INTO order_details VALUES(NULL,'$MobileNo','$itemName',$qty,$price,'$current_date','$amount Rs','','','')";
	}elseif(date('H') >= 12 && date('H') < 15){
		$sql1="INSERT INTO order_details VALUES(NULL,'$MobileNo','$itemName',$qty,$price,'$current_date','','$amount Rs','','')";
	}elseif(date('H') >= 15 && date('H') < 19){
		$sql1="INSERT INTO order_details VALUES(NULL,'$MobileNo','$itemName',$qty,$price,'$current_date','','','$amount Rs','')";
	} elseif(date('H') >= 19 && date('H') < 23){
		$sql1="INSERT INTO order_details VALUES(NULL,'$MobileNo','$itemName',$qty,$price,'$current_date','','','','$amount Rs')";
	}
	mysqli_query($conn,$sql1) or die(mysqli_error($conn));
?>