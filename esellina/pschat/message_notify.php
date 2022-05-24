<?php
session_start();
//connect.php;
$dbconn = mysqli_connect("localhost","eseltwgh_starite","paschal@081","eseltwgh_esellina");
//$dbconn = mysqli_connect("localhost","root","","esellina");


if(isset($_POST['view'])){



if($_POST["view"] != '')
{
    $update_query = "UPDATE chats SET status = 1 WHERE status=0";
    mysqli_query($dbconn, $update_query);
}
$id = $_SESSION['id'];
$query = "SELECT * FROM chats WHERE to_id = '$id' AND status ='0'  LIMIT 7";
$result = mysqli_query($dbconn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
     
    $query = "SELECT * FROM users WHERE user_id";
    $results = mysqli_query($dbconn, $query);

    while($rows = mysqli_fetch_array($results))
 {
   $output .= '
   <li>

   <a class="dropdown-item d-flex align-items-center" href="../../chat.php?user='.$rows["username"].'">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../uploads/'.$rows["pic"].'" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                         <div class="small text-gray-500">New Message @'.$rows["firstname"].'  '.$rows["lastname"].'  </div>
                                         <div class="text-truncate">view</div>
                                         <div class="small text-gray-500">'.$row["created_at"].'</div>
                                    </div>
                                </a>
   
   </a>
   </li>
   ';
 }
 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
}



$status_query = "SELECT * FROM chats WHERE status='0'";
$result_query = mysqli_query($dbconn, $status_query);
$counts = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $counts
);

echo json_encode($data);

}