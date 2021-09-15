<?php
session_start();
 //error_reporting(1);
	// background page comes in
	include("index_background.php");
	//db connection goes here -->
include('database_connect.php');
?>
<?php
if(isset($_POST['delete_post']))
{
	$user_id=intval($_POST['user_id']);
	$post_id=intval($_POST['post_id']);
	$query = "DELETE FROM user_post WHERE post_id=$post_id AND user_id=$user_id;";
	$statement = $dbconn->prepare($query);
	$statement ->execute();
}

if(isset($_POST['comment']))
	{
		$user_id=intval($_POST['user_id']);
		$post_id=intval($_POST['post_id']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		$query1 = "INSERT INTO user_post_comment (post_id,user_id,comment) VALUES ($post_id, $user_id, '$txt')";
		$statement = $dbconn->prepare($query1);
		$statement ->execute();
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>post</title>
	<link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<!-- <script src="Profile_js/Profile.js"> </script> -->
    <!-- <script src="Profile_js/post_index.js"> </script> -->
	<script src="Profile_js/chat.js"> </script>
	<script type="text/javascript" src="jquery.js"> </script>
	<script type="text/javascript" src="jquery.form.js"> </script>
	<script>
	function time_get()
	{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			posting_pic.post_time.value=time;
	}
	function time_get1()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		posting_pic1.post_time.value=time;
	}

	$(document).ready(function(){
		$('form').ajaxForm(function(){

		});
	});
</script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
		}
		#post_button{
	font-size:12px;
	height:25;
	width:55;
	padding:2;
	background-color:purple; color:#FFFFFF;
	border-top:#29447E;
	border-right-color:#29447E;
	border-bottom-color:#1A356E;
	border-left-color:#29447E;
	font-weight:bold;
}
.loader{
	position:fixed;
	bottom:0;
	left:100px;
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
<section>
<div class="bg">

<div  class="container">
<!-- form for searching goes here -->
<form  method="post" class="navbar-form navbar-right">
    <div class="form-group" style="position:absolute;left:69.6%; top:5.18%; font-size:13px; "> <input class="form-control" type="text" name="search" style="width:149.5;" id="searchbar" autocomplete="off"> </div>
        <div class="form-group" style="position:absolute;left:81.8%;top:5.2%; ">   <input class="form-control" type="submit" name="search" value="search"  />  </div>
        <div style="position:absolute;left:90.8%;top:4.2%; ">   <a href=""><img src="img/pawn-logo.PNG" class="img-fluid" width=20px height=30px></a>  </div>
	<div class="countryList" id="countryList" style="postion:absolute; width:235px; z-index:1001;"></div>
	</form>
<div style="position:absolute;left:13.6%; top:14.8%;"> <a href="chat.php" style="text-decoration:none;"> <input type="button" value="Chats" id="singup_button">    </a> </div>

<div style="position:absolute;left:8%; top:25%; height:1; width:26.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:8%; top:25%; height:10%; width:0.10%; background-color:#CCCCCC; "> </div>

<div style="position:absolute;left:34.75%; top:25%; height:10%; width:0.10%; background-color:#CCCCCC; "> </div>

<div style="position:absolute; left:13.4%; top:26.2%;">  <font size="4"> Pawn Chats </font>  </div>
<div style="position:absolute; left:12%; top:30%; color:black; font-size:11px;"> <font face="myFbFont">Meet with People and make more sells. </font></div>

<div style="position:absolute;left:10.4%; top:32.8%; height:1; width:22.05%; background-color:#CCCCCC; "> 

</div>
<!-- users details fetched goes here -->
<div style="position:absolute;left:10.4%; top:32.8%; margin:2px;" class="data">
	<table class="table" id="tablelettercard">
	     <thead>
				
					<div scope="col" style="padding:15px; font-style: inherit;
        font-family: 'Times New Roman', Times, serif; font-size:20px;">Members</div>
					
				
			</thead>
		<tbody id="userdata">
			
		</tbody >
	</table>
	


</div>

<div style="position:absolute;left:50.6%; top:14.8%;"> <a href="status.php" style="text-decoration:none;"> <input type="button" value="Sales" id="singup_button">    </a> </div>
<div style="position:absolute;left:37.1%; display:none; top:32%; height:9.8%; width:5.9%; background-color:#F6F7F8; z-index:1;" id="about_txt_background"> </div>
<div style="position:absolute;left:38.3%; top:35%; font-weight:bold; z-index:1;"> <a href="info.php" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_about_txt();" onMouseOut="out_about_txt();"> About </a>  </div>
<div style="position:absolute;left:43.1%; display:none; top:32%; height:9.8%; width:8.4%; background-color:#F6F7F8; z-index:1;" id="photos_txt_background"> </div>
<div style="position:absolute;left:44.7%; top:35%; font-weight:bold; z-index:1; color:#3B59B0;"> <a href="photo.php" style="text-decoration:none; color:#3B59B0;" onMouseOver="on_photos_txt();" onMouseOut="out_photos_txt();">  Photos </a> <samp style="color:#717171;"> <?php ?> </samp> </div>


			
    
<!-- form for posting goes here -->
<div class="container">
<form method="post" action="upload.php" enctype="multipart/form-data"  name="post_pic" id="formdata">
<div style="position:absolute; left:37.5%; top:21.5%;" class="form-group ">
		<textarea class="form-control" style="height:70; width:450; border:none;" name="post_txt" maxlength="511" placeholder="what do you want to tell potential buyers?" id="post_txt"></textarea>
	</div>	
	<div style="position:absolute; left:60.5%; top:21.5%;" class="form-group ">
	<input type="text" name="price" class="form-control" style="height:50; width:100;" placeholder="Enter Price" id="price"></div>
    <input type="hidden" name="post_time">
	<div style="position:absolute; left:62%; top:33.9%;" class="form-group ">
	<select style="background: transparent; border-bottom:5px;" name="priority" class="form-control" id="priority"> 
<option value="Public"> Public </option> 
<option value="Private"> Only me </option> 
	</select>
	</div>
<div style="position:absolute; left:53%; top:35%; ">
<span><img src="img/download.JPEG" style=" height:20; width:20;" id="post_img"  onclick="triggerClick()"/> Add Photo </span>
</div>
<div style="position:absolute; left:34%; top:65%;"class="form-group" id="error_profileImage">
<input type="file" id="profileImage" id="post_pic" onchange="displayImage(this)" name="post_pic" style="display:none;" multiple>
</div>
<div style="position:absolute; left:69.5%; top:25%; " id="upload" class="form-group">	
		<input class="btn btn btn-default" type="submit" value="Upload" name="file" id="profileImage" onClick="time_get()"/>	
	</div>
</form>
<div style="position:absolute;left:37.4%; top:40%; height:1; width:37.05%; background-color:#CCCCCC; "> <br>
<div <?php //echo $count_bg1+3; ?> > </div>

<?php //echo $_SESSION['status_id'];?>
<div>

<div class="table-responsive" id="image_table"> 

<?php

//db connection goes here -->
include('database_connect.php');
$id=$_SESSION['id'];

//fetched first 4 data from db for pagination from user post
$query= ("SELECT * FROM user_post WHERE user_id=$id ORDER BY post_id DESC LIMIT 0, 4");
$statement = $dbconn->prepare($query);
$statement ->execute();
$result = $statement->fetchAll();
$count = $dbconn->query('SELECT * FROM user_post');
$num = $count->rowCount();
?>
<?php echo '<span style="color:green;">Users have</span> '.$num.' <span style="color:green;">items to be sold in our website <p>Buy now or Add yours</p></span>';?>
<?php

foreach($result as $post_data){
    
	$post_id = $post_data[0];
	$user_id = $post_data[1];
	$post_txt=$post_data[2];
	$post_img=$post_data[6];
	$post_price=$post_data[3];
	
	
	// from users table
	$query= "SELECT * FROM users WHERE user_id= '$user_id'";
	$statement = $dbconn->prepare($query);
	$statement ->execute();
	$result1 = $statement->fetchAll();
	foreach($result1 as $fetch_user_info){
			$users = $fetch_user_info['user_id'];
			$user_name=$fetch_user_info[1];
			$user_name2=$fetch_user_info[2];
			$user_name3=$fetch_user_info[3];
			$user_Email=$fetch_user_info[5];
			$user_gender=$fetch_user_info[10];

			$output = "";
	
	//from profile pic table
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
			  <!-- delete form -->
			 <form method="post" >
			  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
			  <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" >
			  <input type="submit" name="delete_post" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2.4%;"> 
			</form>

	<?php
	
			}
	   }
	}
	
	?>
<div class="img-fluid loader">
<!-- image loader -->
<img src="img/loader.gif" class="img-fluid" width=100%>
</div>
<div class="msg"></div>
</div>

</div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src='js/jquery.js'></script>		
	<script>

function triggerClick() {
    document.querySelector('#profileImage').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#post_img').setAttribute('src',e.target.result);

        }
        reader.readAsDataURL(e.files[0]);
    }
}
	//script for pagination or infinite scrolling
    $(document).ready(function(){
		$('.loader').hide();
	   var load=0;
	   var num = "<?php echo $num; ?>";
        $(window).scroll(function(){
            if($(window).scrollTop()==$(document).height()-$(window).height()){
				$('.loader').show();
				load++;
				if(load*4 > num){
					$('.msg').text("no more dats");
					$('.loader').hide();
				}else{
					$.post("fetch_profile.php",{load:load},function(data){
					$('#image_table').append(data);
					$('.loader').hide();
				});
				}
            }
		})


$(document).on('click','.view_user', function(){

var user_id = $(this).attr('id');
if(confirm("Wants to view Profile")
)
{

   
$.ajax({
   url:"view_profile.php",
   method: "POST",
   data:{user_id:user_id},
   success: function(data){
	$("#userprofile").html(data);
	  
   }
})

}

});
    });
    </script>
</body>
</html>
