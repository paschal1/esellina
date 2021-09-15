<?php
session_start();
include('../../config/dbconn.php');
if(isset($_SESSION['id'])){

   
?>
<?php

$msg ="";
$css_class="";
if(isset($_POST['file'])){
    //echo "<pre>", print_r($_FILES['profile_image']['name']),"</pre>";

    $id = $_SESSION['id'];
    $profile_imageName = time().'_'.$_FILES['profile_image']['name'];
    

    $target = '../../uploads/profile/'. $profile_imageName;

    if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)){
        $sql = "INSERT INTO user_profile_pic (user_id,image) VALUES ('$id','$profile_imageName')";
        if(mysqli_query($dbconn,$sql)){
// $msg ="Profile Picture Uploaded successfully";
        // $css_class = "alert-success";

        header("location: ../index.php");
        }else{
            $msg ="Profile Picture Uploaded Failed";
        $css_class = "alert-danger"; 
        }
        
    }else{
        $msg ="Profile Picture Uploaded Failed";
        $css_class = "alert-danger"; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script type="text/javascript" src="fb_files/fb_index_file/fb_js_file/Registration_validation.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
    .form-div{
        margin-top:100px;
        border: 1px solid #e0e0e0;
        padding-top:15px;
    }
    #profileDisplay{
        display: block;
        width:160px;
        margin:10px auto;
        border-radius:50%;
    }
    .control{
        position:absolute; left:45.5%; top:44%;
        padding-bottom:12px;
    }
    .text-center{
        padding-bottom:20px;  
    }
    hr{
        color:grey;
        width:100%;
    }

    
  @media (max-width: 900px){
   .fa{
   		font-size: 20px;
   		padding: 10px;
   }
  }


  @media (max-width: 600px){
  	.carousel-caption{
  		display: none;
  	}
  	#icon{
  		max-width: 150px;
  	}
  	h4{
  		font-size: 1.7em;
  	}

  }
    </style>
</head>
<body>

<?php
 
    require("functions.php");
    $userdata = getprofilepic($dbconn,$profile_id);
	//include("step1_background/background.php");
?>

<form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();">
<?php if(!empty($msg)):?>
<div class="alert<?php echo $css_class;?>">
<?php echo $msg; ?>
</div>
<?php endif;?>
<div style="position:absolute; left:45%; top:10%; ">
<img src="step1_images/user.jpeg" style=" height:60; width:60;" id="profileDisplay" onclick="triggerClick()"/> 
</div>
<div style="position:absolute; left:45%; top:15%;"class="form-group">
<input type="file" id="profileImage" onchange="displayImage(this)" name="profile_image" style="display: none;">

</div>
<div style="position:absolute; left:47.5%; top:34%; " id="upload" class="form-group">	
        <input class="btn btn btn-default" type="submit" value="Upload" name="file" id="upload_button"/>	
        <hr>
   
</form>

</div> 
    <div class="control">
    <div class="text-center">Manage your Account </div>
    <div class="text-center">Notifications & Sounds</div>
    <div class="text-center">change profile picture <?php?></div>
    <div class="text-center">Partners</div>
    <div class="text-center">Add Friends</div>
    <div class="text-center">Delete Post</div>
    <div class="text-center">Delete Account</div>
    <div class="text-center">Report a Problem</div>
    <div class="text-center">Help</div>
    <div class="text-center">Legal and Policies</div>
    <a class="btn btn-default btn-round" href="../post_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
</div>
<script src="script.js"></script>
</body>
</html>
<?php
}
?>