<?php
session_start();
//db connection goes here -->
include('database_connect.php');
require('functions.php');
if(isset($_POST['searchVal'])){

    $searchq = $_POST['searchVal'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

    //$id = $_SESSION['id'];

    $query= ("SELECT * FROM users   WHERE firstname LIKE  '%$searchq%' OR middlename LIKE  '%$searchq%' OR lastname LIKE  '%$searchq%'  LIMIT 10") or die("could not search");
    $statement = $dbconn->prepare($query);
    $statement ->execute();
    $result = $statement ->fetchAll();
    $output = '';
    if($result==0){
        $output = 'There was no search result!';
    }else{



        foreach($result  as $row){
            $users = $row['user_id'];

            $query= "SELECT  *FROM user_profile_pic  WHERE user_id='$users' ORDER BY timeCreated DESC";
            $statement = $dbconn->prepare($query);
            $statement ->execute();
            $result2 = $statement->fetchAll();
            foreach($result2 as $fetch_user_pic){

            $user_pic=$fetch_user_pic[2];
            $user_pic1=$fetch_user_pic[0];


            $output .= '<tr style="padding:0pxmargin:0px; padding-right:0px; border-spacing: 1px;">
         '.count_unseen_message($row['user_id'], $_SESSION['id'], $dbconn).' '.fetch_is_type_status($row['user_id'],$dbconn).'
         <td style="padding:1px;" margin:0px; padding-right:0px; border-spacing: 15px;><span class="circle" ><img src="../uploads/profile/'.$user_pic.'" height="40px" width="40px" class="img-circle"" /></span> </td>
         <td style="padding:1px; margin:0px; padding-right:0px;  border-spacing: 15px;"><button type="button" class="start_chat" style="border:none; background-color:white;"  data-touserid="'.$row["user_id"].'" data-tousername="'.$row["firstname"].'">
         '.$row["lastname"].' '.$row["firstname"].'  '.$row["middlename"].'
        </button> </td>';
            }
        }
    }
   
}
echo $output;
?>
                
</body>
</html>
             
