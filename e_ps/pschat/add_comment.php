<?php
//db connection goes here -->
include('database_connect.php');
//include functions here.. 
include('functions.php');
 //error_reporting(1);

	// background page comes in
	//include("index_background.php");
	// if(isset($_POST['subcomment']))
	// {
		$user_id=intval($_POST['user_id']);
		$post_id=intval($_POST['post_id']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		$query1 = "INSERT INTO user_post_comment (user_id,post_id,comment) VALUES ('$user_id','$post_id','$txt')";
		$statement = $dbconn->prepare($query1);
		$statement ->execute();
		}
		
		if($statement){
			header('Location: post_index.php');
		}
	// }
?>