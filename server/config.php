<?php
session_start();

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "LAP254678";         /* Password */
$dbname = "elearning";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
