<?php




function getConversation($user_id,$dbconn){
    
    # getting all the conversations for current (loggedin user)
    $sql = "SELECT * FROM conversations WHERE user_1=? OR user_2=? ORDER BY conversations_id DESC";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$user_id,$user_id]);

        if($stmt->rowCount()===1){
            $conversations = $stmt->fetchAll();
            
            $user_data = [];
            # looping through the conversations 
            foreach($conversations as $conversation){

                # if conversations user 1 row equals to user id
                if($conversation['user_1'] === $user_id){

                     $sql2 = "SELECT * FROM users WHERE user_id=?";
                    $stmt2 = $dbconn->prepare($sql2);
                    $stmt2->execute([$conversation['user_2']]);
                }else{
                    $sql2 = "SELECT * FROM users WHERE user_id=?";
                    $stmt2 = $dbconn->prepare($sql2);
                    $stmt2->execute([$conversation['user_1']]);

                }

                #fetch all convers
                $allConversations = $stmt2->fetchAll();
                #pushing the data into array 
                array_push($user_data, $allConversations[0]);

            }

            return $user_data;

        }else{
            $conversations = [];
            return $conversations;
        }

}


?>

 