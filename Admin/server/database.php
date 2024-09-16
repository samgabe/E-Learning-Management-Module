<?php

$con = mysqli_connect('localhost','root','LAP254678','elearning');

// Check connection
if ($con)
{
echo "" ;
 }
 else{
 	echo mysqli_error($con);
 }

?>

