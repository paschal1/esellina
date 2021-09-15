<?php
    session_start();
    include('../config/dbconn.php');

    if(isset($_SESSION['id'])){

        header("location: e_ps/index.php");

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
          //var  
        $user_unsafe=$_POST['username'];
        $pass_unsafe=$_POST['password'];
        //security check 
        $user = mysqli_real_escape_string($dbconn,$user_unsafe);
        $pass1 = mysqli_real_escape_string($dbconn,$pass_unsafe);
        //hass password
        $pass=md5($pass1);
        $salt="a1Bz20ydqelm8m1wql";
        $pass=$salt.$pass;


        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");            
        //checking if user exist

        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE username='$user' AND password='$pass'");
        $res=mysqli_fetch_array($query);
        $id=$res['user_id'];
        $user=$res['username'];
        $_SESSION['username'] = $user;

      

        if (mysqli_num_rows($query)<1){
            $_SESSION['msg']="Login Failed, User not found!";
            header('Location:user_login_page.php');

        
        }

        else{
		
            $res=mysqli_fetch_array($query);
            $_SESSION['id']=$res['user_id'];
            

            //date_default_timezone_set("Africa/Lagos");
            //recording status info..... inserting current time to determine when user is online or offline
           // $time = date("h:i:sa");
            $_SESSION['id']=$id;
            $que="INSERT INTO user_status (user_id)  VALUES ('$id')";
            $res = mysqli_query($dbconn,$que);
            $_SESSION['status_id']=mysqli_insert_id($dbconn);
            

           
            	
            header('Location: user_index.php');
        
            //recording log info.....
            $_SESSION['id']=$id;
            $remarks="has logged in the system at ";  
            mysqli_query($dbconn,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($dbconn));
            }
        }
?>
