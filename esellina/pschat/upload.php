<?php
 session_start();
// //upload multiple files
 include('database_connect.php');



// ?>

 <?php
// if(isset($_SESSION['id'])){
//         $msg ="";
//         $css_class="";
//           if(isset($_POST['submit'])){
// //          //  echo "<pre>", print_r($_FILES['post_image']['name']),"</pre>";
// 			$id=$_SESSION['id'];
// 			$post_txt =$_POST['post_txt'];
//             $price =$_POST['price'];
//             $qty =$_POST['qty'];
//             $priority = $_POST['priority'];
// 			$post_imageName = time().'_'.$_FILES['post_pic1']['name'];
			

          
     
//             $target = '../uploads/'. $post_imageName;	
            
//             if(!empty($post_imageName)){

            
        
//            if(move_uploaded_file($_FILES['post_pic1']['tmp_name'], $target)){
				
//            echo $_SESSION['id'];        
// 	$sql = "INSERT INTO user_post (user_id, post_txt, price, qauntity, priority, post_pic) VALUES ('$id','$post_txt', '$price', '$qty', '$priority', '$post_imageName')";
//     $statement = $dbconn->prepare($sql);
//     $statement ->execute();
    
    
    
	
// 	if($statement){
// 		header("location: post_index.php");
// 		$msg ="Profile Picture Uploaded successfully";
//  echo "alert-success";
// 	}
//else{
//         header("location: index_twice.php"); 
// 	}
	
        
                
// }else{
//     header("location: index_twice.php"); 
// } 
//      }else{
//                 $msg ="Profile Picture Uploaded Failed";
//                 $css_class = "alert-danger"; 
        //     }
        
		// }

  if(isset($_POST['delete_post']))
{
	$post_id=intval($_POST['post_id']);
	$query = "DELETE FROM user_post where post_id=$post_id;";
	$statement = $dbconn->prepare($query);
	$statement ->execute();
}
        //  }

        //  }else{
        //      echo "no be me";
        //  }

         if(isset($_POST['post'])){
            
            $id=$_SESSION['id'];
			$post_txt =$_POST['post_txt'];
            $price =$_POST['price'];
            $qty =$_POST['qty'];
            $lat =$_POST['latitude'];
            $lon =$_POST['longitude'];
            $priority = $_POST['priority'];
			$post_imageName = time().'_'.$_FILES['post_pic1']['name'];

             $target = '../uploads/'. $post_imageName;	
            
            if(!empty($post_imageName)){

           if(move_uploaded_file($_FILES['post_pic1']['tmp_name'], $target)){

            $sql = "INSERT INTO user_post (user_id, post_txt, price, qauntity, latitude, longitude, priority, post_pic) VALUES('$id', '$post_txt', '$price', '$qty', '$lat', '$lon', '$priority', '$post_imageName')";
            $stmt = $dbconn->prepare($sql);
            $stmt -> execute();

            if($stmt){
                $sm = 'Post Uploaded Successfully';
                header("location: index_twice.php?success=$sm");
            }

           }else{

                $em = 'Post Upload Failed';
                header("location: index_twice.php?error=$em");
            }
        }else{

                $em = 'Post Upload Failed';
                header("location: index_twice.php?error=$em");
            }

         }

?>
    