<?php
session_start();
//db connection goes here -->
include('database_connect.php');
//include functions here.. 
include('functions.php');
 //error_reporting(1);
// if(isset($_POST['send_message']))
// {
    $to_user_id=intval($_POST['to_user_id']);
    $from_user_id=intval($_SESSION['id']);
    $txt=$_POST['chat_message'];
    $status = '1';
    if($txt!="")
    {
    $query1 = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES ('$to_user_id', '$from_user_id', '$txt', '$status')";
    $statement = $dbconn->prepare($query1);
    $statement ->execute();
    }
    if($statement){
        header('Location: post_index.php');
    }
// }