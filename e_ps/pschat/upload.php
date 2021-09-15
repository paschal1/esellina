<?php
session_start();
//upload multiple files
include('database_connect.php');


?>

<?php

        $msg ="";
        $css_class="";
        // if(isset($_POST['file'])){
         //  echo "<pre>", print_r($_FILES['post_image']['name']),"</pre>";
			$id=$_SESSION['id'];
			$post_txt =$_POST['post_txt'];
            $price =$_POST['price'];
            $qty =$_POST['qty'];
            $post_time = $_POST['post_time'];
            $priority = $_POST['priority'];
			$post_imageName = time().'_'.$_FILES['post_pic']['name'];
			

          
     
            $target = '../uploads/'. $post_imageName;	
            
            if(!empty($post_imageName)){

            
        
           if(move_uploaded_file($_FILES['post_pic']['tmp_name'], $target)){
				
            $_SESSION['id']=$id;        
	$sql = "INSERT INTO user_post (user_id, post_txt, price, qauntity, post_time, priority, post_pic) VALUES ('$id','$post_txt', '$price', '$qty', '$post_time', '$priority', '$post_imageName')";
    $statement = $dbconn->prepare($sql);
    $statement ->execute();
    $result = $statement->fetchAll();
    
    
	
	if($result){
		header("location: post_index.php");
		$msg ="Profile Picture Uploaded successfully";
        $css_class = "alert-success";
	}else{
        header("location: post_index.php"); 
	}
	
        
                
}else{
    header("location: post_index.php"); 
} 
     }else{
                $msg ="Profile Picture Uploaded Failed";
                $css_class = "alert-danger"; 
            }
        
		//}

        if(isset($_POST['delete_post']))
{
	$post_id=intval($_POST['post_id']);
	$query = "DELETE FROM user_post where post_id=$post_id;";
	$statement = $dbconn->prepare($query);
	$statement ->execute();
}


?>