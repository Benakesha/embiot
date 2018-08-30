<?php

$host="localhost";
$user="root";
$password="BNag18@123";
$db="hotels";

$conn=mysqli_connect($host,$user,$password,$db);

if(!$conn){

	echo "Mysql connection error:".mysqli_connect_error();
}


?>