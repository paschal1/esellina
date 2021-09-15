<?php
	session_start();
	error_reporting(1);
	include('../config/dbconn.php');
	$query1=mysqli_query("SELECT * FROM users WHERE username='$username'");
	$rec1=mysqli_fetch_array($query1);
	$userid=$rec1[0];
	mysqli_query("UPDATE user_status SET status='Offline' WHERE user_id='$userid'");
	unset($_SESSION['username']);
	//session_destroy();
	header("location:../index.php");
?>