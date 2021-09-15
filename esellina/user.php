<?php
function getUser($username, $dbconn){
     $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$username]);

        if($stmt->rowCount()===1){
            $user = $stmt->fetch();
            return $user;
        }else{
            $user = "";
            return $user;
        }
}