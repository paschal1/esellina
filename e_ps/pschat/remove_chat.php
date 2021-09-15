<?php
//remove chat 

include('database_connection.php');

if(isset($_POST['user_id'])){


    $query="UPDATE chat_message SET status='2' WHERE '".$_POST['user_id']."'";
    $statement = $dbconn->prepare($query);
    $statement ->execute();
}


?>