<?php 

function getChats($id_1, $id_2, $dbconn){
   
   $sql = "SELECT * FROM chats
           WHERE (from_id=? AND to_id=?)
           OR    (to_id=? AND from_id=?)
           ORDER BY chat_id ASC";
    $stmt = $dbconn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chats = $stmt->fetchAll();
    	return $chats;
    }else {
    	$chats = [];
    	return $chats;
    }

}