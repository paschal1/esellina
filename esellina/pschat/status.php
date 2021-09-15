<?php
session_start();
include('../config/dbconn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>eSellina | Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
   

<div class="page-header">
    <h1>eSellina | Product Gallery <small>An online store for all</small></h1>
</div>

<!-- eCommerce Detail - START -->


<!-- add status start here -->
    

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">

                        <a href="user_post_things.php"><img src="img/statusphoto.PNG" style=" height:10; width:10;"
                                id="status_img" /></a>



                        <a href="user_post_things.php">
                            <div>
                                <font size="4"> Click To Add Status </font>
                            </div>
                            <div style=" color:black; font-size:11px;">
                                <font face="myFbFont">Update your product. </font>
                            </div>
                        </a>



                    </div>
                </div>
            </div>
        




<div class="table-responsive"> 
<table class="table" id="fetch">

           
</table>
</div>
        
</body>

</html>
<html>



</form>

<script>
$(document).ready(function() {

    load_image_data();

    // setInterval(function(){
    //    update_user_status();
    // 	load_image_data();
    // }, 2000);

    // fetch users

    function load_image_data() {

        $.ajax({
            url: "fetch_status.php",
            method: "POST",
            success: function(data) {
                $('#fetch').html(data);
            }
        })

    }

    function update_user_status() {
        $.ajax({
            url: "update_user_status.php",

            success: function(data) {



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
<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $('#rating1').shieldRating({
            max: 5,
            step: 1,
            value: 3,
            markPreset: false
        });
    });
</script>

<style>
    .btn
    {
        border-radius: 0;
    }

    .colors
    {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .color
    {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 0;
    }

        .color:first-of-type
        {
            margin-left: 20px;
        }

    .black
    {
        background: #000000;
    }

    .gray
    {
        background: #808080;
    }

    .gold
    {
        background: #D3AF37;
    }
</style>
<!-- eCommerce Detail - END -->

</div>

</body>
</html>>