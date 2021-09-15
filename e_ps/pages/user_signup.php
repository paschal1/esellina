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
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <style>
        .content{
            padding-top: 100px;
        }
    </style>
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="../index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Serve(5) Start Technology, Inc." data-placement="bottom">
                    E-PS pawn.ng
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

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

    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/bg4.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="user_signup.php">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                **LOGO**
                                E-ps Pawn
                                <!--insert logo here-->
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="firstname" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="middlename" class="form-control" placeholder="Middle name" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="lastname" class="form-control" placeholder="Last name" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_bank"></i>
                                </span>
                                <input type="text" name="address" class="form-control" placeholder="Complete address" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons tech_mobile"></i>
                                </span>
                                <input type="text" name="contact" class="form-control" placeholder="Contact info" required>
                            </div>
                            <input type="hidden" name="status" value="Offline">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_single-02"></i>
                                </span>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons tech_mobile"></i>
                                </span>
                                <input type="text" name="phone" class="form-control" placeholder="Phone eg. +2348130062780" required>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control"  required>
                            </div>

                            <div class="input-group form-group-no-border input-lg">
                                <!-- <span class="form-control">
                                    <i value="Gender"></i> -->
                                <!-- </span> -->
                                <select class="form-contro" name="gender" style="width:120;height:35;font-size:18px;padding:3; color:black;" required>
			                    <option value="Select Gender:"> Select Gender: </option>
			                    <option value="Female"> Female </option>
			                    <option value="Male"> Male </option>
                                <option value="Custom"> Custom </option>
		                        </select>
                            </div>

                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class=""></i>
                                </span>
                                <input type="date" id="birthday_date" name="birthday_date" placeholder="" class="form-control"  required>
                            </div>

                            
            
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" id="submit" name="submit">
                                 Create account
                            <span class="glyphicon glyphicon-floppy-save"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Serve(5) Start Technology, Inc.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>