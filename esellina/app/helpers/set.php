<?php
function getSettings($user_id,$dbconn){

    $query = "SELECT * FROM user_settings WHERE user_id=?";
    $query = $dbconn->prepare($query);
        $query->execute([$user_id]);
         if($query->rowCount()===1){
            $users = $query->fetchAll();
            foreach($users as $users2){
               return $users2; 
            
        }

         }     

}