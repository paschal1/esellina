<?php
//connect.php;
$dbconn = mysqli_connect("localhost","eseltwgh_starite","paschal@081","eseltwgh_esellina");
//$dbconn = mysqli_connect("localhost","root","","esellina");



if(isset($_POST['view'])){



if($_POST["view"] != '')
{
    $update_query = "UPDATE user_post_comment SET status = 1 WHERE status=0";
    mysqli_query($dbconn, $update_query);
}
$query = "SELECT cmt.comment_id AS comment_id, ux.firstname, ux.lastname, ux.pic, cmt.comment AS comment, cmt.timeCreated AS timeCreated FROM user_post_comment AS cmt INNER JOIN users AS ux ON cmt.user_id = ux.user_id WHERE status = '0' ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($dbconn, $query);
$output = '';

if($result){
$query = "SELECT cmt.post_id AS post_id, ux.firstname, ux.lastname, ux.pic, cmt.post_pic AS post_pic, post_txt AS post_txt FROM user_post AS cmt INNER JOIN users AS ux ON cmt.user_id = ux.user_id WHERE status = '0' ORDER BY post_id DESC LIMIT 3";
$results = mysqli_query($dbconn, $query);

while($row = mysqli_fetch_array($results))
 {
   $output .= '
   <li>

   <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../uploads/'.$row["pic"].'" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                         <div class="small text-gray-500">New Post By '.$row["firstname"].'  '.$row["lastname"].'  </div>
                                         <div class="text-truncate">'.$row["post_txt"].'</div>
                                    <div class="dropdown-list-image mr-3">
                                        <img class="img-thumbil" src="../uploads/'.$row["post_pic"].'" alt="...">
                                
                                    </div>
                                    </div>
                                </a>
   
   </a>
   </li>
   ';

 }
}
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
                                        
                                         <div class="small text-gray-500">New Comment @'.$row["firstname"].'  '.$row["lastname"].'  </div>
                                         <div class="text-truncate">'.$row["comment"].'</div>
                                         <div class="small text-gray-500">'.$row["timeCreated"].'</div>
                                    </div>
                                </a>
   
   </a>
   </li>
   ';

 }
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


$status_query = "SELECT * FROM user_post_comment WHERE status='0'";
$result_query = mysqli_query($dbconn, $status_query);
$counts = mysqli_num_rows($result_query);
$count = $num1 + $counts;
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}