<?php
session_start();
include'server/database.php';
//Code for Registration 
if(isset($_POST['signup']))
{
	$sname=$_POST['sname'];
	$courseid=$_POST['courseid'];
	$coursename=$_POST['coursename'];
	$units=$_POST['units'];
	
$sql=mysqli_query($con,"insert into courses(sname,courseid,coursename) values('$sname','$courseid','$coursename')");
$mysqli_query($con,$sql);
if($sql>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else
{

	echo "<script>alert('Register successfully');</script>";
}
}
mysqli_close($con);


?>