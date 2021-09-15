<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title></title>
</head>

<body>
    <?php

session_start();
if(isset($_SESSION['id'])){
include('database_connect.php');


$load=htmlentities(strip_tags($_POST['load'])) * 4;
$query= ("SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT $load,4");
$statement = $dbconn->prepare($query);
$statement ->execute();
$result = $statement->fetchAll();




foreach($result as $post_data){
    
$post_id = $post_data[0];
$user_id = $post_data[1];
$post_txt=$post_data[2];
$post_img=$post_data[7];
$post_price=$post_data[3];



$query= "SELECT * FROM users WHERE user_id= '$user_id'";
$statement = $dbconn->prepare($query);
$statement ->execute();
$result1 = $statement->fetchAll();
$output='';
foreach($result1 as $fetch_user_info){
        $users = $fetch_user_info[0];
        $user_name=$fetch_user_info[1];
		$user_name2=$fetch_user_info[2];
		$user_name3=$fetch_user_info[3];
        $user_Email=$fetch_user_info[5];
        $user_gender=$fetch_user_info[10];


$query= "SELECT  *FROM user_profile_pic  WHERE user_id='$users' ORDER BY timeCreated DESC";
$statement = $dbconn->prepare($query);
$statement ->execute();
$result2 = $statement->fetchAll();
foreach($result2 as $fetch_user_pic){

         $user_pic=$fetch_user_pic[2];
        $user_pic1=$fetch_user_pic[0];

            $ids = $_SESSION['id'];
			$query= "SELECT  *FROM user_profile_pic  WHERE user_id='$ids' ORDER BY timeCreated DESC";
			$statement = $dbconn->prepare($query);
			$statement ->execute();
			$result6 = $statement->fetchAll();
			foreach($result6 as $fetch_user_pic){
			
					 $user_pic2=$fetch_user_pic[2];
					$user_pic1=$fetch_user_pic[0];
    ?>


    <div>

        <div style="padding-top:4px; padding-bottom:7px;">
            <?php if($user_pic != ""):?>
            <span><img src="../uploads/profile/<?php echo $user_pic; ?> " height="40px" width="40px"
                    class="img-circle" /> </span>
            <?php else: ?>
            <img src="img/user.jpeg" height="40px" width="40px" class="img-circle" id="profileDisplay"
                onclick="triggerClick()" />
            <?php endif; ?>
            <?php $output .='<span><button type="button" class="view_user" id="'.$fetch_user_info['user_id'].'" style="border:none; background-color:white;">'.$user_name.'  '.$user_name2.'  '.$user_name3.'</button></span>';?>
            <?php echo $output; ?>
        </div>

        <?php if($post_img != ""):?>
        <img src="../uploads/<?php echo $post_img; ?>" width="100%" height="100px" class="img-thumbnail" />

        <?php else: ?>
        <img src="../uploads/default.jpg" width="100%" height="200px" class="img-thumbnail" />
        <?php endif; ?>
        <p><?php echo $post_data[2]; ?></p>
        <p><?php echo $post_data[4].' Item in Stock'; ?></p>

        <hr>
        <span>&#8358;<?php echo $post_data[3]; ?><span>

                <form method="post">
                    <span> <a href="user_post_details.php?post_id=<?php echo $post_id;?>"><button type="button"
                                class="btn btn-warning btn-xs edit" id="<?php echo $post_data[1];?>">Order</button></a>
                </form>
                <form method="post" action="" data-sendmessage-form-id="<?php echo $loop_key; ?>">
                    <input type="hidden" name="to_user_id" display="none" value="<?php echo $user_id;?>">

                    <input type="hidden" name="from_user_id" display="none" value="<?php echo $from_user_id;?>">
                    <input type="hidden" name="chat_message" display="none" value="Is this Available">
                    <button type="submit" name="send_message" class="btn btn-success btn-round pull-right submit"
                        data-toggle="modal" data-target="#myModal">
                        <i class="now-ui-icons shopping_cart-simple"></i>Send Message</button>
                </form>
            </span>
            <?php 
			 }
			 //comment box goes here
			 //require("comment1.php");?>
            <button type="button" placeholder="" style="border:none; background-color:white; " id="comment2" width=15%>
                <?php if($user_pic != ""):?>
                <img src="../uploads/profile/<?php echo $user_pic2; ?> " height="20px" width="20px"
                    border-radius="50px" />
                <?php else: ?>
                <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;" />
                <?php endif; ?>
                <?php }?>
                Drop your comment...</button>
            <form method="post" action="" class="form-group" data-comment-form-id="<?php echo $loop_key; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <div class="form-group">
                    <textarea class="form-input" type="text" style="border:none;" placeholder="comment here..."
                        name="comment_txt" id="comment" row="2" col="3" value=""></textarea>
                    <input type="image" class="submit" title="submit" name="subcomment" src="img/sendtext.PNG"
                        alt="Send" width=30px height=22px />
                    <i class="bi bi-cursor"></i>
            </form>
    </div>
    <?php
$query= "SELECT * FROM user_post_comment WHERE post_id=$post_id ORDER BY comment_id";
$statement = $dbconn->prepare($query);
$statement ->execute();
$result4 = $statement->fetchAll();
$count = $statement->rowCount();
	?>

    <span> &nbsp; <input type="button" value="Comment(<?php echo $count; ?>)"
            style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;"
            onClick="Comment_focus(<?php echo $post_id; ?>);" onMouseOver="Comment_underLine(<?php echo $post_id; ?>)"
            onMouseOut="Comment_NounderLine(<?php echo $post_id; ?>)" id="comment<?php echo $post_id; ?>">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="color:#999999;"> </span> </span>
    </div>

    <?php
	foreach($result4 as $comment_data){
		$comment_id=$comment_data[0];
		$comment_user_id=$comment_data[1];
	?>
    <?php
	$clen=strlen($comment_data[3]);
	if($clen>0 && $clen<=60)
	{
		$cline1=substr($comment_data[3],0,60);
	?>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"><img
                src="../uploads/profile/<?php echo $user_pic; ?> " height="20px" width="20px" border-radius="50px" />
            <?php echo '<b>'.$user_name.'</b>';?> <?php echo '<b>'.$user_name2.'</b>';?>
            <?php echo '<b>'.$user_name3.'</b>';?> <?php echo $cline1; ?></td>
    </tr>
    <?php
	}
	else if($clen>60 && $clen<=120)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
	?>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
    </tr>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4"> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
    </tr>
    <?php
	}
	else if($clen>120 && $clen<=180)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
	?>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
    </tr>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4"> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
    </tr>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4"> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
    </tr>
    <?php
	}
	else if($clen>180 && $clen<=240)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
	?>
    <table>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
        </tr>
        <?php
	}
	else if($clen>240 && $clen<=300)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
	?>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
        </tr>
        <?php
	}
	else if($clen>300 && $clen<=360)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
	?>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
        </tr>
        <?php
	}
	else if($clen>360 && $clen<=420)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
		$cline7=substr($comment_data[3],360,60);
	?>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td bgcolor="#EDEFF4"> </td>
            <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline7; ?></td>
        </tr>
    </table>
    <?php
	}
	?>
    </div>


    <?php
        }
   }
}
}
?>


</body>
<script>
// Here is where i wrote the javascript to prevent page reload for comment form
$(document).ready(function() {

    $('form[data-comment-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_comment.php",
                data: form_data,
                success: function() {
                    $(this).reset();
                    alert('comment sent');
                }

            })

        });
    });

    // Here is where i wrote the javascript to prevent page reload for sendMessage button  
    $('form[data-sendmessage-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "quickmessage.php",
                data: form_data,
                success: function() {

                    // if(data.error != ''){
                    alert('message sent');
                    $(this).reset();
                    //      $('#comment_message').html(data.error);
                    // }
                }

            })
        });
    });
});
</script>


</html>