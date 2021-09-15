<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
    <title>comment</title>
    <style>
    .circle img{
        border:1px;
        height:40px;
        width:40px;
        border-radius:50px;
        
    }
    #alert_popover{
        display:block;
        position:absolute;
        bottom:50px;
        left:50px;
    }
    .wrapper{
        display: table-cell;
        vertical-align: bottom;
        height:auto;
        width:200px;

    }
    .alert_default{
        color:#333333;
        background-color:#f2f2f2;
        border-color:#cccccc;
    }
    </style>
</head>
<body>
<div>
<hr>
<button type="button" placeholder="" style="border:none; background-color:white; " id="comment2" width=15%>
        <?php if($user_pic != ""):?>
  <img  src="../uploads/profile/<?php echo $user_pic; ?> " height="20px" width="20px" border-radius="50px"/> 
  <?php else: ?>
    <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;"/>
    <?php endif; ?>
        
        Drop your comment...</button>
     
    </div>
        
</body>
</html>
<script src="Profile_js/fetch.js"> </script>