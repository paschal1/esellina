<?php
include('../../config/dbconn.php');
$profile_id=$_SESSION['id'];
function  getprofilepic($dbconn,$profile_id){

    $query = "SELECT * FROM user_profile_pic WHERE profile_id='$profile_id'";
    $result= mysqli_query($dbconn,$query);

    $array = array();
    while($row = mysqli_fetch_array($result)){
        $array['profile_id'] = $row['profile_id'];
        $array['image'] = $row['image'];

    }
return $array;


}
?>