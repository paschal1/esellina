<?php

session_start();

    include('database_connect.php');
    

    require('functions.php');

    $username= $_SESSION['username'];
    $id = $_SESSION['id'];

    $query= "SELECT * FROM users   WHERE user_id != '$id' ";
    $statement = $dbconn->prepare($query);
    $statement ->execute();
    $result = $statement ->fetchAll();
    

 
$output ="";
//$row2 = mysqli_fetch_assoc($result2);


   
    
foreach($result as $row){
    $status="";
    $image="";
   
    $currentTimestamp = strtotime(date("Y-m-d H:i:s").'- 10 second');
    $currentTimestamp = date("Y-m-d H:i:s",$currentTimestamp);
    $last_activity = fetch_user_last_activity($row['user_id'],$dbconn);
    
    $userid=$row['user_id'];
  

    if($last_activity > $currentTimestamp){

        $status="<div style='background-color:green; border-radius:3px; height:5px; width:6px;'></div>";

    }else{

        $status="<div style='background-color:purple; border-radius:3px; height:5px; width:6px;'></div>";
    }

    
    
    $query3 = ("SELECT image FROM user_profile_pic  WHERE user_id=$userid ORDER BY timeCreated desc");
    $statement = $dbconn->prepare($query3);
    $statement ->execute();
    
 
    
    foreach($statement as $rows){

      $image = $rows['image'];
      



    
$output .= '<tr style="padding:0pxmargin:0px; padding-right:0px; border-spacing: 1px;">
         '.count_unseen_message($row['user_id'], $_SESSION['id'], $dbconn).' '.fetch_is_type_status($row['user_id'],$dbconn).'
         <td style="padding:1px;" margin:0px; padding-right:0px; border-spacing: 15px;><span class="circle" ><img src="../uploads/profile/'.$image.'" height="40px" width="40px" class="img-circle"" />'.$status.'</span> </td>
         <td style="padding:1px; margin:0px; padding-right:0px;  border-spacing: 15px;"><button type="button" class="start_chat" style="border:none; background-color:white;"  data-touserid="'.$row["user_id"].'" data-tousername="'.$row["firstname"].'">
         '.$row["lastname"].' '.$row["firstname"].'  '.$row["middlename"].'
        </button> </td>';
    }
}
echo $output;

?>