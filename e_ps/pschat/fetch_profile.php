
<?php

session_start();
if(isset($_SESSION['id'])){
include('database_connect.php');


if(isset($_POST['delete_post']))
{
	$user_id=intval($_POST['user_id']);
	$post_id=intval($_POST['post_id']);
	$query = "DELETE FROM user_post WHERE post_id=$post_id AND user_id=$user_id;";
	$statement = $dbconn->prepare($query);
	$statement ->execute();
}
$id=$_SESSION['id'];
$load=htmlentities(strip_tags($_POST['load'])) * 4;
$query= ("SELECT * FROM user_post WHERE user_id=$id ORDER BY post_id DESC LIMIT $load,4");
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
    ?>


<div>
 
 <div style ="padding-top:4px; padding-bottom:7px;">
 <?php if($user_pic != ""):?>
  <span  ><img  src="../uploads/profile/<?php echo $user_pic; ?> " height="40px" width="40px" class="img-circle"/> </span>
  <?php else: ?>
    <img src="img/user.jpeg" height="40px" width="40px" class="img-circle" id="profileDisplay" onclick="triggerClick()"/>
    <?php endif; ?>
    <?php $output .='<span><button type="button" class="view_user" id="'.$fetch_user_info['user_id'].'" style="border:none; background-color:white;">'.$user_name.'  '.$user_name2.'  '.$user_name3.'</button></span>';?>
	 <?php echo $output; ?></div>

        <?php if($post_img != ""):?>
        <img src="../users/<?php echo $post_img; ?>" width="450px" height="100px" class="img-thumbnail"/>

        <?php else: ?>
            <img src="../uploads/default.jpg" width="450px" height="200px" class="img-thumbnail"/>
                                <?php endif; ?>
        <p><?php echo $post_data[2]; ?></p>
        
        <hr>
         <span>&#8358;<?php echo $post_data[3]; ?><span>
         <form method="post" >
			  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
			  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" >
			  <button type="submit" name="delete_post" value=" " style="background-color:#FFFFFF; color:red; border:#FFFFFF;  width:2.4%;"> Delete</button>
			</form> 
        <input type="hidden" value="is this available" id="chat_message_'<?php $post_data[1];?>'" name="chat_message_'<?php $post_data[1];?>'">
         <a href="chat.php"><button  type="button"  name="send_chat" class="btn btn-default send_chat" id="<?php echo $post_data[1];?>">Chat</button></a>
         
         </span>
         
         <?php //require("comment1.php");?>
    </div>


<?php
        }
   }
}
}
?>

