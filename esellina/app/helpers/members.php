<?php
function getMembers($user_id,$dbconn){
    $id = $_SESSION['id'];
    $query = " SELECT * FROM users WHERE user_id != '$id'";
    $query = $dbconn->prepare($query);
        $query->execute([$user_id]);
         if($query->rowCount()===1){
            $users = $query->fetchAll();
            foreach($users as $conversations){
               return $conversations; 
            
        }

         }     

}