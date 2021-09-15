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
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>status</title>
    <style type="text/css">
    .wrapper {
        width: 500px;
        margin: 0 auto;
    }
    </style>
</head>

<body>



    <div class="wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2> Add Product to Status </h2>
                    </div>
                    <p>Please fill this form and submit to add product to the database.</p>

                    <form action="form_submit.php" method="post" id="uploadStatus" enctype="multipart/form-data">

                        <div class="form-group ">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="" id="product_name"
                                required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Price</label>
                            <input type="text" name="product_price" class="form-control" value="" id="product_price"
                                required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="product_type">Quantity</label>
                            <input type="number" name="product_type" class="form-control" value="" id="product_type"
                                required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="product_desc">Product Description</label>
                            <input type="text" name="product_desc" class="form-control" value="" id="product_desc"
                                required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="" id="location" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label for="product_pic">Add Picture</label>
                            <input type="file" name="file" class="form-control" value="" id="product_pic" required>
                            <span class="help-block"></span>
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit" value="Submit" name="submit">
                        <a href="post_index.php" class="btn btn-default">Cancel</a>
                    </form>
                    <div class="result">

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<script>
$(document).ready(function(e) {

    $('#uploadStatus').on('submit', function(e) {

        e.preventDefault();


        $.ajax({
            url: "form_submit.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                //$("#preview").fadeOut();
                $("#err").fadeOut();

            },


            success: function(data) {

                if (data == 'invalid') {
                    $('#err').html("Invalid file !").fadeIn();
                } else {
                    $('#preview').htmlspecialchars(data).fadeIn();
                    $('#uploadStatus')[0].reset();
                }
            }
            error: function(e) {
                $("#err").html(e).fadeIn();
            }
        });
    });

});
</script>