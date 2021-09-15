<?php
session_start();
if (isset($_SESSION['id'])) {
        
     include 'connect.php';
     $id = $_SESSION['id'];

                $sql = "UPDATE users SET last_seen = now() WHERE user_id = ?";
                $stmt = $dbconn->prepare($sql);
                $stmt->execute([$id]);
                
 }else{
     header('location:../../index.php');
        exit();
    }