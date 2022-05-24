<?php
//db connection goes here -->
include('..//config/dbconn.php');

 //error_reporting(1);

	
	if(isset($_POST['comment']))
	{
		$user_id=$_POST['user_id'];
		$post_id=$_POST['post_id'];
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		$query1 = "INSERT INTO user_post_comment (user_id,post_id,comment) VALUES ('$user_id','$post_id','$txt')";
		$result=mysqli_query($dbconn,$query1);
		if($result){
			header("location:index_twice.php?80fg=$user_id");
		}else{
			echo'something went wrong'; 
		}

		
				
			

		}	
			
		
		
	 }
?>