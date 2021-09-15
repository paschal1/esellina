<?php
  include('database_connect.php');
  session_start();
  include('functions.php');
// if($_POST)
// {
// 	$username=$_SESSION['username'];
//     $msg=$_POST['msg'];
        
// 	$sql="INSERT INTO `chat`(`username`, `message`) VALUES ('".$username."', '".$msg."')";

// 	$query = mysqli_query($dbconn,$sql);
// 	if($query)
// 	{
// 		header('Location: chatroom.php');
// 	}
// 	else
// 	{
// 		echo "Something went wrong";
// 	}
	
// 	}
	
	$data = array(

		':to_user_id'		=>  $_POST['to_user_id'],
		':from_user_id'		=>  $_SESSION['id'],
		':chat_message'		=>  $_POST['chat_message'],
		':status'			=>	'1'
	);

	$sql="INSERT INTO chat_message(to_user_id, from_user_id, chat_message, status) VALUES (:to_user_id, :from_user_id,:chat_message,:status)";

	$statement = $dbconn->prepare($sql);

	if($statement->execute($data))
	{
		echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id'], $dbconn);
	}

?>