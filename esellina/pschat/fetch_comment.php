<?php
include('../config/dbconn.php');
$query= "SELECT * FROM user_post_comment WHERE status= 0 ORDER BY comment_id DESC";
$result = mysqli_query($dbconn, $query);
$output="";
while($row = mysqli_fetch_array($result)){
    $output .= '<div class="alert alert_default">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p><small>'.$row["comment"].'</small></p></div>';
}
$update_query = "UPDATE user_post_comment SET status= 1 WHERE status= 0";
mysqli_query($dbconn, $update_query);
echo $output;

?>