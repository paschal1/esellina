<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" href="epsimage/icon.png" type="image/png">

    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 160px;
        /* Same as the width of the sidenav */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
    </style>
</head>

<body>

    <!--head background-->
    <a href="index.php">



        <div style="position:absolute;left:0%;top:0%; height:13.2%; width:100%; z-index:-1;background-color:#fd5521;">
        </div>
        <!--text: pawn -->
        <div
            style="position:absolute;left:30.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;">
            <font face="myFbFont"> PAWN </font>
        </div>
        <!--body background-->
        <div style="position:absolute;left:0%;top:13.2%; height:90%; width:100%; z-index:-1;"> </div>
        <!-- <-- bottom background -->
        <div style="position:absolute;left:0%;top:110%; height:5%; width:100%; z-index:-1; "> </div>
        <div style="position:absolute;left:20%;top:105%;">
            <font face="myFbFont"> <span style=" color:#3B5998;" onMouseOver="open_developer_details()"
                    onMouseOut="close_developer_details()" id="my_name"> (EPS PAWN) powered by Starite Inc </span>
            </font>
        </div>
        <div style="position:absolute;left:20%;top:18%;">
            <font face="myFbFont"> <span style=" color:#3B5998;" onMouseOver="open_developer_details()" </font>
        </div>

    </a>

    <div class="sidenav">
        <a href="">
            <img src="epsimage/icon.png" width="100%" height="15%" class="img-fluid" />

        </a>
        <a href="../pages/user_index.php">
            <button class="btn default">Home</button>
        </a>
        <a href="pawn_step1/user_settings1.php">
            <button class="btn default">Profile</button>
        </a>
        <a href="chat.php">
            <button class="btn default">Chats</button>
        </a>

        <a href="../../website/website/page/product.php">
            <button class="btn default">About</button>
        </a>
        <a href="status.php">
            <label class="btn default">Goods Area</label>
        </a>
        <a href="../../website/website/page/services.php">
            <label class="btn default">Services</label>
        </a>
        <a href="../../website/website/page/home.php">
            <label class="btn default">Clients</label>
        </a>
        <a href="../../website/website/page/contactus.php">
            <label class="btn default">Contact</label>
        </a>
    </div>

    <div class="main">

    </div>

</body>


</html>