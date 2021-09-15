<?php
    session_start();
    include('../config/dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" class="img-fluid" href="../assets/epsimage/icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-Ps pawn</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />

    <style>
    .content-vent {
        padding-top: 100px;
    }
    </style>
</head>

<body class="login-page sidebar-collapse">


    <?php
// including the database connection file
include("../config/dbconn.php");
error_reporting(1);


if(isset($_POST['submit'])){ 
    $email=$_POST['email'];

// $query=mysqli_query("SELECT * FROM users WHERE email='$email'");
// $count1=mysqli_num_rows($dbconn,$query);

// if($count1<1)
// {
//     echo "<script>
//             alert('There is an existing account associated with this email.');
//         </script>";
// }
// else
// {

    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $birthday_date=$_POST['birthday_date'];
    
    $pass1=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass1=$salt.$pass1;

   
    if(empty($firstname) || empty($middlename) || empty($lastname) || empty($address) || empty($email) || empty($contact) || empty($username) || empty($phone) || empty($password) || empty($gender) || empty($birthday_date)){    

    // checking empty fields
            
        if(empty($firstname)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
        }

        if(empty($middlename)) {
            echo "<font color='red'>Middlename field is empty!</font><br/>";
        }
        
        if(empty($lastname)) {
            echo "<font color='red'>Lastname field is empty!</font><br/>";
        }

        if(empty($address)) {
            echo "<font color='red'>Address field is empty!</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty!</font><br/>";
        }

        if(empty($contact)) {
            echo "<font color='red'>Contact field is empty!</font><br/>";
        }
        
        if(empty($username)) {
            echo "<font color='red'>Username field is empty!</font><br/>";
        }  

        if(empty($phone)) {
            echo "<font color='red'>Your Phone Number field is empty!</font><br/>";
        }      

        if(empty($password)) {
            echo "<font color='red'>Password field is empty!</font><br/>";
        }  
        
        if(empty($gender)) {
            echo "<font color='red'>Gender field is empty!</font><br/>";
        } 

        if(empty($birthday_date)) {
            echo "<font color='red'>Birthday date field is empty!</font><br/>";
        } 
         
    } else {    
        //updating the table
        $query = "INSERT INTO users (firstname, middlename, lastname, address, email, contact, username, phone, password, gender, birthday_date) 
                VALUES ('$firstname','$middlename','$lastname','$address','$email','$contact','$username','$phone','$pass1','$gender','$birthday_date')";

        $result = mysqli_query($dbconn,$query);
        session_start();
        $_SESSION['temppuser']=$email;
    
    
        if($gender=="Male")
        {
            header("location:pawn_step1/Step1_Male.php");
        }
        else
        {
            header("location:pawn_step1/Step1_Female.php");
        }
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
        header("Location: ../index.php");
        
    }

  }
  
}
//

?>

    <?php
if(isset($_POST['submit'])){

    $status = $_POST['status'];

    $query = "SELECT * FROM `users` WHERE username='$username' AND user_id=''";
    $result = mysqli_num_rows($dbconn,$query);
    if($result)

    $sql = "UPDATE user_status (SET status='Offline') WHERE ('$username=username')";
    $res = mysqli_query($dbconn,$sql);
}

?>

    <div class="page-header" filter-color="orange" style="padding:15px;">
        <div class="page-header-image" style="background-image:url(../assets/img/bg4.jpg)"></div>

        <div class="col-md-4 content-center">
            <div class="card  card-plain">

                <div class="container h-100 ">
                    <div class=" row h-100 justify-content-center align-items-center">
                        <form id="contact-form" method="post" action="user_signup.php" role="form">


                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Firstname *</label>
                                            <input id="form_name" type="text" name="firstname" class="form-control"
                                                placeholder="Please enter your firstname *" required="required"
                                                data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname *</label>
                                            <input id="form_lastname" type="text" name="lastname" class="form-control"
                                                placeholder="Please enter your lastname *" required="required"
                                                data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Middle name *</label>
                                            <input id="form_name" type="text" name="middlename" class="form-control"
                                                placeholder="Please enter your Middle name *" required="required"
                                                data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Address *</label>
                                            <input id="form_lastname" type="text" name="address" class="form-control"
                                                placeholder="Please enter your Address *" required="required"
                                                data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="form_email" type="email" name="email" class="form-control"
                                                placeholder="Please enter your email *" required="required"
                                                data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="status" value="Offline">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phone">Contact</label>
                                            <input id="form_phone" type="tel" name="contact" class="form-control"
                                                placeholder="Please enter your Contact Info">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Phone *</label>
                                            <input id="form_email" type="tel" name="phone" class="form-control"
                                                placeholder="Phone eg. +2348130062780 *" required="required"
                                                data-error="Valid Phone number is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phone">Password</label>
                                            <input id="form_phone" type="password" name="password" class="form-control"
                                                placeholder="Please enter your password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <span style="color:gray;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">DOB *</label>
                                                <input id="form_email" type="date" name="birthday_date"
                                                    class="form-control" placeholder="Please enter your DOB *"
                                                    required="required" data-error="Valid DOB is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6" bg="black">
                                            <div class="form-group">
                                                <label for="form_need">Gender *</label>
                                                <select id="form_need" name="gender" class="form-control"
                                                    required="required" data-error="Please specify your need.">

                                                    <option value="Select Gender:"> Select Gender: </option>
                                                    <option value="Female"> Female </option>
                                                    <option value="Male"> Male </option>
                                                    <option value="Custom"> Custom </option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_phone">Username</label>
                                            <input id="form_phone" type="text" name="username" class="form-control"
                                                placeholder="Please enter your Username">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </span>
                                <div class="col-md-12">
                                    <input type="submit" class="bbtn btn-primary btn-round btn-lg btn-block"
                                        value="Create account" id="submit" name="submit">
                                    <span class="glyphicon glyphicon-floppy-save"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> These fields are required.
                                    </p>
                                </div>
                            </div>
                    </div>

                    </form>




                </div>
            </div>
        </div>


    </div>
    </div>

    </div>

</body>


</html>