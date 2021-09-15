<?php
// session_start();
// if(!isset($_SESSION['id'])){
//     header("location: chat_login.php");
// }

include('database_connect.php');
include('functions.php');
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
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>chat</title>
    <!-- <LINK REL="SHORTCUT ICON" HREF="fb_files/fb_title_icon/Faceback.ico" /> -->

    <script type="text/javascript">
    function searchq() {
        var searchTxt = $('input[name="search"]').val();
        $.post("search.php", {
            searchVal: searchTxt
        }, function(data) {
            $('#datasearch').html(data);

        });
    }
    </script>
    <style>
    body {
        height: 100%;
        width: 100%;
        background-color: purple;
        /* clip-path: polygon(10% 1%, 90% 49%, 49% 79%, 0 99%, 0 0); */
        position: absolute;
        z-index: -1;
        background: radial-gradient(triangle, rgba(55, 184, 219, 1) 0%, rgba(20, 84, 219, 1) 100%;

            );
        background-image: url(img/balloon.jpg);
        background-blend-mode: SCREEN;

    }

    .data {
        background-color: white;
        font-style: inherit;
        font-family: serif;
        font-size: 100%;
    }

    #singup_button {
        background: purple;
        color: #FFFFFF;
        border-top-color: white;
        border-right-color: purple;
        border-left-color: purple;
        font-size: 15px;
        height: 30;
        width: 75;
        font-weight: bold;
        box-shadow: -5px 0px 10px 1px rgb(0, 0, 0);

    }

    #login_button {
        font-size: 10px;
        height: 25;
        width: 49;
        padding: 2;
        background-color: #5B74A8;
        color: #FFFFFF;
        border-top: #29447E;
        border-right-color: #29447E;
        border-bottom-color: #1A356E;
        border-left-color: #29447E;
        font-weight: bold;
    }

    .circle img {
        border: 1px;
        height: 40px;
        width: 40px;
        border-radius: 50px;
    }


    @media (max-width: 900px) {
        .fa {
            font-size: 20px;
            padding: 10px;
        }
    }


    @media (max-width: 600px) {
        .carousel-caption {
            display: none;
        }

        #icon {
            max-width: 150px;
        }

        h4 {
            font-size: 1.7em;
        }

    }
    </style>
    <link href="fb_files/fb_font/font.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="bg">

        <div class="container">
            <a href="chat_search.php">
                <div style="position:absolute;left:90.8%;top:4.2%; " class="btn default"> <input type="button"
                        value="Search Users" title="Search" class="form control search-query"
                        src="assets/img/search.png" alt="Search" />
                </div>
            </a>

            <div style="position:absolute;left:13.6%; top:14.8%;"> <a href="" style="text-decoration:none;"> <input
                        type="button" value="Chats" id="singup_button"> </a> </div>

            <div style="position:absolute;left:8%; top:25%; height:1; width:26.85%; background-color:#CCCCCC; "> </div>
            <div style="position:absolute;left:8%; top:25%; height:10%; width:0.10%; background-color:#CCCCCC; "> </div>

            <div style="position:absolute;left:34.75%; top:25%; height:10%; width:0.10%; background-color:#CCCCCC; ">
            </div>

            <div style="position:absolute; left:13.4%; top:26.2%;">
                <font size="4"> Pawn Chats </font>
            </div>
            <div style="position:absolute; left:12%; top:30%; color:black; font-size:11px;">
                <font face="myFbFont">Meet with People and make more sells. </font>
            </div>

            <div style="position:absolute;left:10.4%; top:32.8%; height:1; width:22.05%; background-color:#CCCCCC; ">

            </div>

            <div style="position:absolute;left:10.4%; top:32.8%; margin:2px;" class="data">
                <table class="table" id="tablelettercard">
                    <thead>

                        <div scope="col" style="padding:15px; font-style: inherit;
        font-family: 'Times New Roman', Times, serif; font-size:20px;">Members</div>


                    </thead>
                    <tbody id="userdata">

                    </tbody>
                </table>
                <div id="user_model_details"></div>

            </div>

            <div id="datasearch" style="position: relative; left:80.4%; top:30.8%; margin:3px;  color:white; "></div>



        </div>
    </div>
    <script src="Profile_js/chat.js"> </script>
</body>

</html>