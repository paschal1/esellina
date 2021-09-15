<?php
session_start();
include('../../config/dbconn.php');
if(isset($_SESSION['username'])){


?>
<?php

$msg ="";
$css_class="";
if(isset($_POST['file'])){
    //echo "<pre>", print_r($_FILES['profile_image']['name']),"</pre>";

    $id = $_SESSION['id'];
    $profile_imageName = time().'_'.$_FILES['profile_image']['name'];
    

    $target = 'step1_images/'. $profile_imageName;

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
    <link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
    <title>female</title>
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
    </style>
    
</head>
<body>
<?php
	include("step1_background/background.php");
?>

<form method="post" enctype="multipart/form-data" name="uimg" onSubmit="return Img_check();">
<?php if(!empty($msg)):?>
<div class="alert<?php echo $css_class;?>">
<?php echo $msg; ?>
</div>
<?php endif;?>
<div style="position:absolute; left:35%; top:50%; ">
<img src="step1_images/Female.jpg" style=" height:60; width:60;" id="profileDisplay" onclick="triggerClick()"/> 
<?php echo $_SESSION['username']; ?>
</div>
<div style="position:absolute; left:34%; top:65%;"class="form-group">
<input type="file" id="profileImage" onchange="displayImage(this)" name="profile_image" style="display: none;">
</div>
<div style="position:absolute; left:47.5%; top:54%; " id="upload" class="form-group">	
		<input class="btn btn btn-default" type="submit" value="Upload" name="file" id="upload_button"/>	
	</div>
</form>

<script src="script.js"></script>
</body>
</html>
<?php
}
?>