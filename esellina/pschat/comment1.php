<?php

include('database_connect.php');


?>

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	
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
        
        
        Drop your comment...</button>
       
        <form method="POST" id="comment1" style="display:;" class="form-group">
        <div class="form-group">
        <textarea class="form-input" type="text" style="border:none;" placeholder="comment here..." name="comment" id="comment" row="2" col="3" value=""></textarea>
        
        
        
            
        <input type="image" class="img-fluid" value="submit" title="submit" name="submit" src="img/sendtext.PNG" alt="Send" width=30px height=22px />
        <input type="hidden" name="comment_id" id="comment_id" value="0"/>
        </div>
        </form>

        <div>
        <span id="comment_message"></span>
        </br>
        <div id="display_message"></div>
     
    </div>
        
        

    
</body>
</html>
<script >
    $(document).ready(function(){

       $("#comment1").on('submit',function(event){

        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"add_comment.php",
            method:"POST",
            data:form_data,
            dataType:"JSON",
            success:function(data){

                if(data.error != ''){

                     $('#comment1')[0].reset();
                     $('#comment_message').html(data.error);
                }
            }

        })
    });

    load_comment();

    function load_comment(){
        $.ajax({
            url:"comment_fetch.php",
            method:"POST",
            success: function(data){
                $('#display_message').html(data);
            }
        })
    }
    $(document).on('click', '.reply', function(){
        var comment_id = $(this).attr("id");
        $('#comment_id').val(comment_id);
        $('#comment').focus();
    });


    });
      
</script>