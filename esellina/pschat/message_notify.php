<?php
//connect.php;
$dbconn = mysqli_connect("localhost", "root", "", "esellina");


if(isset($_POST['view'])){



if($_POST["view"] != '')
{
    $update_query = "UPDATE user_post_comment SET status = 1 WHERE status=0";
    mysqli_query($dbconn, $update_query);
}
$query = "SELECT cmt.comment_id AS comment_id, ux.firstname, ux.lastname, ux.pic, cmt.comment AS comment, cmt.timeCreated AS timeCreated FROM user_post_comment AS cmt INNER JOIN users AS ux ON cmt.user_id = ux.user_id WHERE cmt.post_id != '' ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($dbconn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <li>

   <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../uploads/'.$row["pic"].'" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                         <div class="small text-gray-500">New Message @'.$row["firstname"].'  '.$row["lastname"].'  </div>
                                         <div class="text-truncate">'.$row["comment"].'</div>
                                         <div class="small text-gray-500">'.$row["timeCreated"].'</div>
                                    </div>
                                </a>
   
   </a>
   </li>
   ';

 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
}

if (isset($_SESSION['lat']) && isset($_SESSION['lon'])) {

                            $lat = $_SESSION['lat'];
                            $lon = $_SESSION['lon'];
                            //$count = $dbconn->query("SELECT * FROM user_post WHERE status ='0' "); 
                            $count = ("SELECT user_id, status, 3959 * acos(cos (radians($lat)) * cos (radians(latitude)) * cos(radians(longitude) - radians($lon)) + sin (radians($lat)) * sin(radians(latitude)) ) AS distance FROM user_post WHERE status ='0' HAVING distance < 10 ORDER BY distance");
                            $result1_query =mysqli_query($dbconn, $count);
                            $num1 = mysqli_num_rows($result1_query);
                        }else{
                            $count = ("SELECT * FROM user_post WHERE status ='0' ORDER BY post_id DESC LIMIT 40"); 
                            $result1_query =mysqli_query($dbconn, $count);
                            $num1 = mysqli_num_rows($result1_query);
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