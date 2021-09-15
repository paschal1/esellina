<?php
// include('../config/dbconn.php');
// if(isset($_POST['txt'])){

// 	$id = $_POST["user_id"];
// 	$post_txt = $_POST["post_txt"];
// 	$post_time = $_POST["post_time"];
// 	$priority = $_POST["priority"];

// 	$sql = "INSERT INTO `user_post`(user_id,post_txt,post_time,priority) VALUES('$id','$post_txt','$post_time','$priority')";
// 	$result = mysqli_query($dbconn,$sql);

// 	if($result){
// 		$msg="nothing goes for nothing";
// 	}
// }

session_start();
include('../config/dbconn.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $txt = htmlspecialchars($_POST['txt']);
    $id = $_SESSION['id'];
    
if(empty($txt)){
    if(empty($txt)){
        echo "";
	}
}else{
        $sql = "INSERT INTO user_post_status (user_id, status) VALUES ('$id','$txt')";
        $query = mysqli_query($dbconn, $sql);

		if($query){
            //redirecting to the display page. In our case, it is index.php
        header("Location: index.php");
        
    }
    }
}
?>