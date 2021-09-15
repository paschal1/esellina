<?php

session_start();
include('../config/dbconn.php');


if(isset($_POST['submit'])) {

    $id=$_SESSION['id'];

     $product_name = $_POST['product_name'];
  
  $product_price = $_POST['product_price'];
 
  $product_type = $_POST['product_type'];

  $product_desc = $_POST['product_desc'];
 
  $location = $_POST['location'];
 
  $post_imageName = time().'_'.$_FILES['file']['name'];

  $target = 'uploads/'. $post_imageName;	

  if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
  
      $sql = "INSERT INTO user_status_product (user_id, product_name, product_price, product_type, product_desc, location, product_pic) VALUES ('$id','$product_name', '$product_price', '$product_type', '$product_desc', '$location', '$post_imageName')";
      $res = mysqli_query($dbconn,$sql);

      if($res){
          header("location:index.php");
      }

  }
 

}

    

?>


       