<?php
session_start();

    include('../config/dbconn.php');

    $query = "UPDATE user_status SET is_type ='".$_POST["is_type"]."' WHERE status_id = '".$_SESSION["status_id"]."'";
    $result = mysqli_query($dbconn, $query);
    
    ?>