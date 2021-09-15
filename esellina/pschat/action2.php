<?php
session_start();


if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('location:../pages/user_login_page.php');
    exit();
}
//db connection goes here -->
include('database_connect.php');
//include functions here.. 
include('functions.php');
//error_reporting(1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="epsimage/icon.png" type="image/png">
    <link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
    <title>Epspawn</title>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <!-- jquery link -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- css links -->
    <link rel="stylesheet" href="edited.css">
    <link rel="stylesheet" href="css/action2.css">

    <!-- bootstrapcdn links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- // ajax script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <style>
    #flash {
        margin-left: 20px;
        text-align: left;
        font-family: bzclose;
        font-style: bzclose;
        font-size: 18px;
    }


    @media (max-height:700px),
    (min-width:700px) {
        #flash {
            margin-left: 20px;
            text-align: left;
            font-family: bzclose;
            font-style: bzclose;
            font-size: 18px;
        }

    }

    @media (min-height:200px),
    (max-width:700px) {
        #flash {
            margin-left: 20px;
            text-align: left;
            font-family: bzclose;
            font-style: bzclose;
            font-size: 18px;
        }

    }

    @media (max-height:400px),
    (max-width:200px) {
        #flash {
            margin-left: 20px;
            text-align: left;
            font-family: bzclose;
            font-style: bzclose;
            font-size: 18px;
        }

    }
    </style>
</head>

<body>






    <div class="row g-0 bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="epsimage/icon.png" class="w-100" alt="...">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h5 class="mt-0">Pawn link</h5>
            <p>Another instance of placeholder content for this other custom component. It is intended to mimic what
                some real-world content would look like, and we're using it here to give the component a bit of body and
                size.</p>
            <a href="loader.php" class="stretched-link">Go somewhere</a>
        </div>
    </div>

    <div class="col d-flex justify-content-center">



    </div>
    </div>






    <?php

       
            $username= $_SESSION['username'];
            $id = $_SESSION['id'];

            $query= "SELECT * FROM users WHERE user_id != '$id'";
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



            $query3 = ("SELECT image FROM user_profile_pic WHERE user_id=$userid ORDER BY timeCreated desc");
            $statement = $dbconn->prepare($query3);
            $statement ->execute();



            foreach($statement as $rows){

            $image = $rows['image'];

                if($image != ""){
                
                }else{

                    
                }

?>



    <?php
               

        echo '<div class="d-flex " id="flash">';
            //echo'<table>';
 echo '<div class="d-flex align-content-start flex-wrap">';
                // echo'<tbody>';


                    echo count_unseen_message($row['user_id'], $_SESSION['id'], $dbconn);
                    echo fetch_is_type_status($row['user_id'],$dbconn); if($image != ""):
                    echo'<span class="circle"><img src="../uploads/profile/'.$image.'" height=" 40px" width="40px"
                            class="img-circle"/>';
                        else:
                        echo '<span class="circle"><img src="img/user.jpeg" alt=""...profile pix height=" 40px" width="40px"
                                class="img-circle"/>';
                            endif;
                            echo $status;
                            echo'</span>';
                            echo'<span style="padding:5px;">';
                        echo $row["firstname"];
                        echo'</span>';
                        echo'<span style="padding:5px;">';
                        echo $row["lastname"];
                        echo'</span>';
                                echo'<span style="padding:5px;">';
                        echo $row["middlename"];
                            echo'</span>';

                        // echo '</tbody>';
                echo '</div>';
                
            echo '</div>';
            echo '<hr color="gray" width="300px" style="position:50px;"  class="pull-center">';
        }
        }


        ?>

    <script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "0";
    }

    function closeNav() {
        const closeNav = document.getElementById("mysidebar")
        document.getElementById("mySidebar").style.width = "0"
        document.getElementById("main").style.marginLeft = "0";
    }
    </script>
</body>

</html>