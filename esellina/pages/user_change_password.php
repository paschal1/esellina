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
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="../index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Serve(8) Web Solutions, Inc." data-placement="bottom">
                    E-Ps Pawn .ng
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


</form>
<div class="page-header" filter-color="blue">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="change_password.php">
                        <div class="header header-primary text-center">
                            Change Your Password
                        </div><br>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="current_pass" class="form-control" placeholder="Current password" required/>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="new_pass" class="form-control" placeholder="New password" required/>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="new_pass_again" placeholder="New Password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" name="change_pass">Change Password</button>
                        </div>
                        
                    </form>

</body>
<html>

<?php
	// include("includes/dbconn.php");

	if(isset($_POST['change_pass'])) {
		

		//above when you click change password button it will fetch all the data in the input field

		$user_id = $_SESSION['id'];
		// the above means that the user is actually signed in

		$current_pass = $_POST['current_pass'];
		$new_pass = $_POST['new_pass'];
		$new_again = $_POST['new_pass_again'];

		$sel_pass = "select * FROM users where password='$current_pass' AND username='$username'";
		// the above will match the user's current password & user email in the database.

		$run_pass = mysqli_query($dbconn, $sel_pass);

		$check_pass = mysqli_num_rows($run_pass);
		// this will fetch out the record matched

		if ($check_pass==0) {
			// if there's no  record found in the db with that current password inserted by the user
			echo "<script> alert('Your Current Password is wrong')</script>";
		}

		if ($new_pass!=$new_again) {
			// if the new password does not match
			echo "<script>alert('New password do not match!')</script>";
			exit();
			// the exit() will end the code here in a case where either the current password is wrong or the new password does not match   
		}

		else{
			$update_pass = "update users set passwod='$new_pass' where username='$username'";
			// the above will now update the existing passowrd of that particular user name

			$run_update = mysqli_query($dbconn, $update_pass);

			echo "<script> alert('Your Password Has Been Updated Successfully!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}



	}
?>