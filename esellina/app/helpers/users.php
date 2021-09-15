<?php
function getUsers($user_id,$dbconn){

    $query = " SELECT * FROM users WHERE user_id=?";
    $query = $dbconn->prepare($query);
        $query->execute([$user_id]);
         if($query->rowCount()===1){
            $users = $query->fetchAll();
            foreach($users as $users1){
               return $users1; 
            
        }

         }     

}