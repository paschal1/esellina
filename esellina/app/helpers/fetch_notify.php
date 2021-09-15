<?php
session_start();
include('../ajax/connect.php');
include 'user.php';
if(isset($_POST['view'])){
    if($_POST['view'] != ''){

                        

    }
    $id = $_SESSION['id'];
    $query = "SELECT * FROM chats WHERE user_id = $id ORDER BY chat_id DESC";
    $statement = $dbconn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $output = "";
    if($statement->rowCount()===0){
    foreach($result as $row){

        $users = getUsers($row['user_id'], $dbconn);
        
        $output .='
        

        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="'.$users["pic"].'" alt="...">
                 <div class="status-indicator bg-success"></div>
                 </div>
            <div class="font-weight-bold">
            <div class="text-truncate">'.$row["message"].'</div>
                <div class="small text-gray-500">'.$row["created_at"].'</div>
                </div>
            </a>
        ';

      }
    }else{

        $output .='
         <div class="small text-gray-500"></div>
         <span class="font-weight-bold">No Chat Notification</span>
            </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
            <div class="icon-circle bg-success">
            <i class="fas fa-donate text-white"></i>
            </div>
        </div>
        ';

    }
    
    $query = "SELECT * FROM chats WHERE opened = 0 AND user_id = $id ";
    $statement = $dbconn->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();

    #store rows in ajax 
    $data = array( 'notification' => $output,'unseen_notification' => $count);
    echo json_encode($data);
}