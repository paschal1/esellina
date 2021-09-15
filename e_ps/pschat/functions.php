<?php


function fetch_user_last_activity($id,$dbconn)
{
$query2 = "SELECT * FROM user_status WHERE user_id ='$id' ORDER BY status DESC LIMIT 1";
$statement = $dbconn->prepare($query2);
$statement ->execute();
$result2 = $statement ->fetchAll();

//$row2 = mysqli_fetch_assoc($result2);
foreach($result2 as $row){

    return $row['status']; 
    $userid = $row['user_id'];


}
}


  
function fetch_user_chat_history($from_user_id, $to_user_id, $dbconn)
{
  $query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";
  $statement = $dbconn->prepare($query);
  $statement ->execute();
  $result = $statement->fetchAll();
  


  $output = '<ul class="list-unstyled">';
  foreach($result as $row){
    
    $user_name ="";
    $chat_message = "";
    if($row["from_user_id"]==$from_user_id){

      if($row["status"]== '2'){

        $chat_message = '<em>This message has been removed</em>';
        $user_name = '<b class="text-success">You</b>';
      }else{
        $chat_message = $row['chat_message'];
        $user_name = '<button type="button" class="btn default btn-xs remove_chat" id="'.$row["user_id"].'">x</button>
        &nbsp<b class="text-success">You</b>';

      }

     
    }else{
      $user_name = '<b class="text-success">'.get_user_name($row['from_user_id'], $dbconn).'</b>';
    }
    //$output = memory_get_usage();
     $output .= '
     <li style="border-bottom:1px dotted #ccc">
     <p>'.$user_name.' - '.$chat_message.'
     <div align="right">
       <small<em>'.$row['timestamp'].'</em></small>
      </div>
      </p>
      </li>
      ';
  }
  $output .='</ul>';
  $query="UPDATE chat_message SET status='0' WHERE from_user_id='".$to_user_id."' AND to_user_id='".$from_user_id."' AND status='1'";
  $statement = $dbconn->prepare($query);
  $statement ->execute();

  return $output;
}


function get_user_name($userid, $dbconn){

    $query = " SELECT firstname FROM users user_id='$userid'";
    $statement = $dbconn->prepare($query);
    $statement ->execute();
    $result = $statement->fetchAll();
    
    foreach($result as $row){
      return $row['firstname'];
    }
    echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id'],$dbconn);
    }
    
    function count_unseen_message($from_user_id, $to_user_id, $dbconn){
    
      $query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1'";
      $statement = $dbconn->prepare($query);
      $statement ->execute();
      $count = $statement->rowCount();
      $output = '';
      if($count > 0){
        $output = '<span class="label label-success">'.$count.'</span>';
      }
      return $output;
     }
     function fetch_is_type_status($userid, $dbconn){

      $query="SELECT is_type FROM users WHERE user_id='".$userid."' ORDER BY status DESC LIMIT 1";
      $statement = $dbconn->prepare($query);
      $statement ->execute();
     $result = $statement->fetchAll(); 
     $output='';
     foreach($result as $row){
       if($row["is_type"] == 'yes'){
         $output='-<small><em><span class="text-muted">Typing now...</span></em></small>';
       } 
     }
     return $output;
     }
     
 

     function catchit($post_id,$dbconn){
      $query1 = "SELECT * FROM user_post WHERE user_id=$post_id";
      $statement = $dbconn->prepare($query1);
      $statement ->execute();
      $result2 = $statement->fetchAll();
      foreach($result2 as $row){
          $post_id = $row[0];
      }
      echo $post_id;
     }


  
  function wrap_tag($argument){
    return '<b>'.$argument.'</b>';
  }
?>