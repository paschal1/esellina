<?php

session_start();
include('database_connect.php');


// function get_user_name($id, $dbconn){
//     $output='';
//         $query = " SELECT * FROM users WHERE user_id='$id'";
//         $statement = $dbconn->prepare($query);
//         $statement ->execute();
//         $result = $statement->fetchAll();
        
//         foreach($result as $row){
//             $output.='
            
//             <span>'.$row["lastname"].' '.$row["firstname"].'  '.$row["middlename"].'</span>
//             ';
            //$output .= get_user_name($id, $row["lastname"],$row["firstname"],$row["middlename"], $dbconn);
        // }
        // echo $output;
        // exit;
        // }



        $id = $_SESSION['id'];
$query= "SELECT * FROM replies WHERE parent_comment_id= '0' ORDER BY comment_id DESC";
$statement = $dbconn->prepare($query);
$statement ->execute();
$result = $statement->fetchAll();
$count = $statement->rowCount();
$output = '';
foreach($result as $row){
    
$user_id = $row[2];
$query= "SELECT * FROM users WHERE user_id= '$user_id'";
$statement = $dbconn->prepare($query);
$statement ->execute();
$result1 = $statement->fetchAll();
foreach($result1 as $row1){




    $output .='
    
    <div class="panel-default" >
    <div class="panel-heading"><b>'.$row1['firstname'].' '.$row1['middlename'].' '.$row1['lastname'].'</b>  <small>at '.$row['timeCreated'].'</small><i></i></div>
    <div class="panel-body">'.$row['comment'].' <button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Delete</button></div></div>
    <div class="panel-footer" align="right"></div>
    </div>
    ';
    $output .= get_reply_comment($dbconn, $row["comment_id"]);
   }
}
echo $count.' comments';
echo $output;
function get_reply_comment ($dbconn, $parent_id=0, $marginleft=0){
    $query = "SELECT * FROM replies WHERE parent_comment_id = '".$parent_id."'";
    $statement = $dbconn->prepare($query);
    $statement ->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    $output='';
    if($parent_id == 0){
        $marginleft = 0;
    }else{
        $marginleft = $marginleft + 48;
    }
    
    if($count > 0){
        foreach($result as $row){
            $output .='
            <div class="panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading"><small>'.$row['timeCreated'].'</small><i></i></div>
    <div class="panel-body">'.$row['comment'].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Delete</button></div>
    </div>
            ';
            $output .= get_reply_comment($dbconn, $row['comment_id'], $marginleft);
        }
    }
    return $output;
}


?>