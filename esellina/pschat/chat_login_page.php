<?php
 
  session_start();
  include('../config/dbconn.php');
  
//   if (isset($_SESSION['id'])){
// 	  header('Location:index.php');
//   }
?>


<html>
<head>
<title> Pawn </title>
<LINK REL="SHORTCUT ICON" HREF="fb_files/fb_title_icon/Faceback.ico" />
	<style>
		#singup_button
		{
			background:purple;
			color:#FFFFFF;
			border-top-color:white;
			border-right-color:purple;
			border-left-color:purple;
			font-size:15px;
			height:30;
			width:75;
			font-weight:bold;
			box-shadow:-5px 0px 10px 1px rgb(0,0,0);

		}
		
		#login_button
		{
			font-size:10px;
			height:25;
			width:49;
			padding:2;
			background-color:#5B74A8; color:#FFFFFF;
			border-top:#29447E;
			border-right-color:#29447E;
			border-bottom-color:#1A356E;
			border-left-color:#29447E;
			font-weight:bold;
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
     <link href="fb_files/fb_font/font.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="position:absolute;left:0;top:0; height:13%; width:100%; z-index:-1; background:purple">   </div>
<div style="position:absolute;left:13.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;"> <font face="myFbFont">  Pawn </font> </div>

<div style="position:absolute;left:13.6%; top:14.8%;"> <a href="post_index.php" style="text-decoration:none;"> <input type="button" value="Sign Up" id="singup_button">    </a> </div>

<div style="position:absolute;left:26%; top:25%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:26%; top:84.9%; height:1; width:46.85%; background-color:#CCCCCC; "> </div>
<div style="position:absolute;left:72.75%; top:25%; height:60%; width:0.10%; background-color:#CCCCCC; "> </div>

<div style="position:absolute; left:27.4%; top:28.2%;">  <font size="4"> Pawn Login </font>  </div>

<div style="position:absolute;left:27.4%; top:32.8%; height:1; width:44.05%; background-color:#CCCCCC; "> </div>

<div style="position:absolute;left:27.4%;top:36.2%; height:18%; width:44.05%; z-index:-1; background:#FFEBE8; ">   </div>

<div style="position:absolute;left:27.4%; top:36.2%; height:1; width:44.05%; background-color:white; "> </div>
	<div style="position:absolute;left:27.3%; top:36.2%; height:18%; width:0.08%; background-color:white; "> </div>
	<div style="position:absolute;left:27.4%; top:54.2%; height:1; width:44.05%; background-color:white; ">    <?php

if (
    isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
	

}
?></div>
	<div style="position:absolute;left:71.35%; top:36.2%; height:18%; width:0.10%; background-color:pink; "> </div>
	
	
	
<form  method="post" action="">
	<div style="position:absolute; left:35.5%; top:57.2%; font-size:15; color:#333333;"> Username </div>
	<div style="position:absolute; left:43.5%; top:57%; font-size:11px; "> <input type="text" name="username" style="width:174;"/> </div>
	<div style="position:absolute; left:35.5%; top:62.2%; font-size:15; color:#333333;"> Password: </div>
	<input type="hidden" name="status">
	<div style="position:absolute;left:43.5%; top:62%; font-size:11px; "> <input type="password" name="password" style="width:174;"> </div>
	<div style="position:absolute; left:43.3%; top:66.7%; font-size:12; ">  <input type="checkbox" checked="checked">   Keep me logged in </div>
	<div style="position:absolute;left:43.5%;top:71.7%; "> <a href="post_index.php"> <input type="submit" name="submit" value="Log In" id="login_button" /> </a> </div>
	<div style="position:absolute;left:47.5%;top:71.7%; "> or </div>
	<div style="position:absolute;left:49%;top:71.7%; "> <a href="post_index.php" style="color:#3B5998;text-decoration:none;"> Sign up for Pawn </a> </div>
	<div style="position:absolute;left:43.5%; top:77.2%; font-size:12px;"> <a href='Forgot_Password.php' style="text-decoration:none; color:#3B5998;" > Forgot your password? </a> </div>
   
    </form>

</body>
</html>



