<?php
session_start();


if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('location:../../login.php');
    exit();
}
#database connect 
include '../../app/http/connect.php';
#include users function
include '../../app/helpers/users.php';
$me = getUsers($_SESSION['id'], $dbconn);

include '../../app/helpers/set.php';
$uSet = getSettings($_SESSION['id'], $dbconn);

$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Eselina Profile</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <style>
        body {
            background: #eee
        }

        .card {
            border: none;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer
        }

        .card:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #E1BEE7;
            transform: scaleY(1);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #f5961b;
            transform: scaleY(0);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after {
            transform: scaleY(1)
        }

        .fonts {
            font-size: 11px
        }

        .social-list {
            display: flex;
            list-style: none;
            justify-content: center;
            padding: 0
        }

        .social-list li {
            padding: 10px;
            color: #f8b21a;
            font-size: 19px
        }

        .buttons button:nth-child(1) {
            border: 1px solid #f1a924 !important;
            color: #f3a024;
            height: 40px
        }

        .buttons button:nth-child(1):hover {
            border: 1px solid #f19a27 !important;
            color: #fff;
            height: 40px;
            background-color: #f1a025
        }

        .buttons button:nth-child(2) {
            border: 1px solid #e4ab0f !important;
            background-color: #ebbb1f;
            color: #fff;
            height: 40px
        }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
   
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center"> <img src="../../uploads/<?= $me['pic']; ?>" width="100" class="rounded-circle"> </div>
                    <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?= $uSet['title']; ?></span>
                        <h5 class="mt-2 mb-0"><?= $me['firstname'] . ' ' . $me['lastname']; ?></h5> <span><?= $uSet['jtitle']; ?></span>
                        <div class="px-4 mt-1">
                            <p class="fonts"><?= $uSet['you']; ?></p>
                        </div>
                        <ul class="social-list">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-dribbble"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                            <li><i class="fa fa-linkedin"></i></li>
                            <li><i class="fa fa-google"></i></li>
                        </ul>
                        
                        <div class="buttons"> <button class="btn btn-outline-primary px-4">Message</button> <button class="btn btn-primary px-4 ms-3">Contact</button> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</body>

</html>