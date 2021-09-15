<?php
session_start();
include('../config/dbconn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	
	
	<!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<title>Market Area</title>
	<style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
			text-align:center;
        }
		.image{
			height:100px;
			width:100;
		}
		img{
			height:20px;
			width:20;
		}
		.naria{
			height:20px;
			width:20;
		}
		#ajax-loader{
			display:none;
		}
		.btn-round{
			margin-top:30px;
			margin-left:30px;

		}

		
		@media (max-width: 900px){
   .wrapper{
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
<form  method="post" class="navbar-form navbar-right" action="status_search.php">

    <div class="form-group" style="position:absolute;left:69.6%; top:5.18%; font-size:13px; "> <input class="form-control" type="text" name="search" style="width:149.5;" id="searchbar" > </div>
        <div class="form-group" style="position:absolute;left:81.8%;top:5.2%; ">   <input class="form-control" type="submit" name="search" value="search"  />  </div>
      
	<div class="countryList" id="countryList" style="postion:absolute; width:235px; z-index:1001;"></div>
	</form>

	<a class="btn btn-default btn-round" href="post_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
<div class="wrapper">
<div style="position:absolute;left:90.8%;top:4.2%; ">   <a href=""><img class="img-fluid" src="epsimage/favicon.PNG"></a>  </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
					
					<a href="user_post_things.php"><img src="img/statusphoto.PNG" style=" height:10; width:10;" id="status_img"  /></a>
 					
					 <a href="status_text.php"><img src="img/statustext.PNG" style=" height:10; width:10;" id="" onclick=""/></a>
					
					
                    <div style="">  <font size="4"> Add Status </font>  </div>
						<div style=" color:black; font-size:11px;"> <font face="myFbFont">Update your product. </font></div>
					
					
		

							</div>
                    </div>
                </div>
            </div>        
			
  
	
                    <div class="result">

							
		<div id="fetch">
		</div>

		</div>
</body>
</html>
<html>



</form>
	
<script>

$(document).ready(function(){

load_image_data();

    // setInterval(function(){
    //    update_user_status();
    // 	load_image_data();
    // }, 2000);

    // fetch users

function  load_image_data(){

$.ajax({
	url:"fetch_status.php",
	method:"POST",
	success:function(data){
		$('#fetch').html(data);  
	}
})

}

function update_user_status(){
   $.ajax({
url: "update_user_status.php",

success: function(data){
   

   
}
    })

}

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
<!-- <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="Profile_js/pawn_pagination.js" type="text/javascript"></script>
</body>
</html>

