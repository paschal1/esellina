<?php
	// background page comes in
	include("index_background.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

                    
                    <br><hr color="orange">
                    <?php
//session_start();
//db connection goes here -->
include('database_connect.php');
if(isset($_POST['search'])){

    $searchq = $_POST['search'];
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

            $output .='
            <div><span class="circle" ><img src="../uploads/profile/'.$user_pic.'" height="40px" width="40px" class="img-circle"" />  '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</span></div>
            ';
            }
        }
    }
   echo $output;
}

?>
                
</body>
</html>
             
