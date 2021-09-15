<?php
session_start();
#check if username and password are submitted 
if(isset($_POST['username']) &&
   isset($_POST['password'])){
#database connect 
include 'connect.php';
    // get data from POST request and store them in var

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
    # error message 
    $em = "Username is required";
    # redirect to 'login.php' and passing error message
    header("location: ../../login.php?error=$em");
    exit;
    }else if(empty($password)){
    # error message 
    $em = "Password is required";
    # redirect to 'login.php' and passing error message
    header("location: ../../login.php?error=$em");
    exit;
    }else{
         $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$username]);

        if($stmt->rowCount()===1){
            #fetching user data
            $user = $stmt->fetch();
            # if both username are strictly eqaul 
            if($user['username'] === $username){

                # verifying the encrypted password
                if(password_verify($password, $user['password'])){
                    #success login
                    #creating session
                   
            $_SESSION['username'] = $user['username'];
            $_SESSION['namew'] = $user['firstname'];
             $_SESSION['name2'] = $user['lastname'];
            $_SESSION['id'] = $user['user_id'];
            $u = $user['user_id'];

                       #redricting to home page 
                       header("location: ../../pschat/index_twice.php?user=$u");

                }else{
                    # error message 
                $em = "Incorrect username or Password";
                 # redirect to 'login.php' and passing error message
                 header("location: ../../login.php?error=$em");
    
                }

            }else{
                # error message 
                $em = "Incorrect username or Password";
                 # redirect to 'login.php' and passing error message
                 header("location: ../../login.php?error=$em");
                  
            }

        }
    }

    }else{
    # redirect to 'signup.php' and passing error message
    header("location: ../../login.php");
    exit;
}