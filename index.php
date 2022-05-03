<?php
session_start();


//db connection goes here -->
include('DATABASE/database_connect.php');
//include functions here.. 
include('DATABASE/functions.php');

//error_reporting(1);
 require_once('geoplugin.class/geoplugin.class.php');

$geoplugin = new geoPlugin();

//load function 
$loadFun = "";
$loadFun = "onload='getLocation()'";
//locate the IP
$geoplugin->locate();

include('http://www.geoplugin.net/php.gp?ip='.$ip);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sellina || Home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">
<script>
        function error(err){
            alert(err).message;
        }
        function success(pos){
            //alert(`${pos.coords.latitude}`, `${pos.coords.longitude}`);
            var lat = pos.coords.latitude;
            var lon = pos.coords.longitude;
            // console.log(lat);
            // console.log(lon);
            jQuery.ajax({
                url:'esellina/pschat/setLatLong.php',
                data:'lat='+lat+'&lon='+lon,
                type:'post',
                success:function(result){
                    //window.location.href="location.html"
                }
            });
        }
        //var x = document.getElementById('demo');
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success,error);
            } else {
                x.innerHTML = "Geolocation is not supported by your browser";
            }
        }

        // function showPosition(position) {
        //     console.log(position);
        //     x.innerHTML = "latitude:" + position.coords.latitude + "<br>longitude: " + position.coords.longitude;
        // }
    </script>
</head>

<body id="page-top" <?php echo $loadFun;?>>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="rounded-circle" src="img/EPS logo ColouredSVG.svg" alt="...user" width="80px">
                </div>
                <div class="sidebar-brand-text mx-3">Esellina<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              ESELLINA
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>POST</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Components:</h6>
                        <a class="collapse-item" href="esellina/login.php">Add Post</a>
                        <a class="collapse-item active" href="esellina/login.php">View Post</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Settings:</h6>
                        <a class="collapse-item" href="esellina/login.php">Profile</a>
                        <a class="collapse-item" href="">Dark mode</a>
                        <a class="collapse-item" href="esellina/login.php">Delete Post</a>
                        <a class="collapse-item" href="">Others</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Explore
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chat Screens:</h6>
                        <a class="collapse-item" href="esellina/login.php">Change Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="esellina/login.php">Chats</a>
                        <a class="collapse-item" href="esellina/login.php">Members</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../pawn/user_index.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span> Authorise Sales/Buyers</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="status.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Goods Area</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"
                    style="background-color: rgb(245, 113, 4);">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php
                                 if (isset($_SESSION['lat']) && isset($_SESSION['lon'])) {

                            $lat = $_SESSION['lat'];
                            $lon = $_SESSION['lon'];
                            //$count = $dbconn->query("SELECT * FROM user_post WHERE status ='0' "); 
                            $count = $dbconn->query("SELECT user_id, status, 3959 * acos(cos (radians($lat)) * cos (radians(latitude)) * cos(radians(longitude) - radians($lon)) + sin (radians($lat)) * sin(radians(latitude)) ) AS distance FROM user_post WHERE status ='0' HAVING distance < 10 ORDER BY distance");
                            $num = $count->rowCount();
                        }else{
                              $count = $dbconn->query("SELECT * FROM user_post WHERE status ='0' "); 
                              $num = $count->rowCount();
                            }
                            echo $num;
                                ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 small"
                                    style="color: cornsilk;">ESELLINA</span>
                                <img class="img-profile rounded-circle" src="epsimage/EPS logo Coloured.jpg">
                            </a>
             
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="esellina/login.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="esellina/login.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chats
                                </a>
                                <a class="dropdown-item" href="esellina/login.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="esellina/sign_up.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sign Up
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <?php
            if (isset($_SESSION['lat']) && isset($_SESSION['lon'])) {
                           $lat = $_SESSION['lat'];
                            $lon = $_SESSION['lon'];
                            
                            $query = ("SELECT post_id, user_id,  post_txt, price, quantity, post_pic, 3959 * acos(cos (radians($lat)) * cos (radians(latitude)) * cos(radians(longitude) - radians($lon)) + sin (radians($lat)) * sin(radians(latitude)) ) AS distance FROM user_post WHERE priority ='public' HAVING distance < 10 ORDER BY distance DESC LIMIT 40");
                        }else{
                              $query = ("SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 40"); 
                              $loadFun = "onload='getLocation()'";
                            }
           // $query = "SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 40";
            $statement = $dbconn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $count = $dbconn->query('SELECT * FROM user_post');
            $num = $count->rowCount();
            foreach ($result as $loop_key => $rows){
            $userid = $rows['user_id'];
            $post_id = $rows['post_id'];

            $query1 = "SELECT * FROM users WHERE user_id=$userid";
            $statement = $dbconn->prepare($query1);
            $statement->execute();
            $results = $statement->fetchAll();
              
            foreach ($results as $loop_key => $row){

           ?>




                    <div class="col d-flex justify-content-center">


                        <div class="card border-none mb-3 center" style="max-width: 30rem;">

                            <div class="card-body text-success">
                                <?php if ($row['pic'] != "") : ?> <span>
                                    <img src="esellina/uploads/<?= $row['pic']; ?> "
                                        class="img-profile rounded-circle" height="40px" width="40px"
                                        class="img-circle" />
                                </span>
                                <?php else : ?>
                                <img src="img/user.jpeg" height="40px" width="100%" class="img-profile rounded-circle"
                                    id="profileDisplay" onclick="triggerClick()" />
                                <?php endif; ?>
                                 <span><button type="button" class="view_user" id="' <?= $row['user_id'];?> '" style="border:none; background-color:white;"> <?= $row['firstname'] . '  ' . $row['lastname'];?></button></span>
                                
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <?php if ($rows['post_pic'] != "") : ?>
                                            <img src="esellina/uploads/<?php echo $rows['post_pic']; ?>" class="img-thumbnail"
                                                width="100%" height="100%" />

                                            <?php else : ?>
                                            <img src="uploads/default.jpg" width="100%" height="200px"
                                                class="img-thumbnail" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">

                                                <p class="card-title">


                                                </p>
                                                <p class="card-text"><?php echo $rows[2]; ?></p>
                                                <p class="card-text"><small
                                                        class="text-muted"><?php echo $rows[4] . ' Item in Stock'; ?></small>
                                                    <span><?php
                                                    if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	                                                    //our visitor is not using the same currency as the base currency
	                                                    echo "<p> " . $geoplugin->convert($rows[3]) ." </p>\n";
                                                            }
                                                    ?>


                                                        <form method="post">
                                                            <span> <a href="user_post_details.php?post_id=<?php echo $post_id; ?>" class="nav-link disabled" tabindex="-1"aria-disabled="true">
                                                                    <button
                                                                        type="button" 
                                                                        class="btn btn-warning btn-xs edit" 
                                                                        id="<?php echo $row[1]; ?>">Order</button></a><br>
                                                        </form>

                         


                                                </p>
                                                <form method="post" action=""
                                                    data-sendmessage-form-id="<?php echo $loop_key; ?>">
                                                    <input type="hidden" name="to_user_id" display="none"
                                                        value="<?php echo $user_id;?>">

                                                    <input type="hidden" name="from_user_id" display="none"
                                                        value="<?php echo $from_user_id;?>">
                                                    <input type="hidden" name="chat_message" display="none"
                                                        value="Is this Available">
                                                   <a href="" class="nav-link disabled" tabindex="-1"aria-disabled="true"> <button type="submit" name="send_message" 
                                                        class="btn btn-success btn-round pull-right submit"
                                                        data-toggle="modal" data-target="#myModal">
                                                        <i class="now-ui-icons shopping_cart-simple"></i>Send
                                                        Message</button></a>
                                                </form>
                                                <!-- here you should either choose to submit call a modal here or submit this form
                                             or do both programmatically from a function -->
                                                <!-- i set it to calling the modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- comment box goes here -->
                                
                                <button type="button" placeholder="" style="border:none; background-color:white; "
                                    id="comment2" width=15%>
                                    <?php if ($row['pic'] != "") : ?>
                                    <img src="esellina/uploads/<?php echo $row['pic']; ?>"
                                        class="img-profile rounded-circle" height="20px" width="20px"
                                        border-radius="50px" />
                                    <?php else : ?>
                                    <img src="uploads/default.jpeg" style=" height:20; width:20; border-radius:50px;" />
                                    <?php endif; ?>

                                    Drop your comment...</button>
                                <!-- // here goes the comment for
                                    m -->
                                <!-- this is one of the form causing the issue with this form send comment to user who
                                    post i want the page note to reload when submit button is clicked -->
                                <form method="post" action="add_comment.php" class="form-group"
                                    data-comment-form-id="<?php echo $loop_key; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                    <div class="form-group">
                                        <textarea class="form-input" readonly="readonly" type="text" style="border:none;"
                                            placeholder="comment here..." name="comment_txt" id="comment" row="2"
                                            col="3" value=""></textarea>
                                        <input type="submit"  class="btn default submit" value="Send" title="submit" 
                                            name="comment" src="img/sendtext.PNG" id="commentBtn" alt="Send" width=30px height=22px />
                                        <i class="bi bi-cursor"></i>
                                </form>
                               



                <!-- </div> -->

                <?php
                include 'show_comment.php';
            }
        
    }
        ?>


                <!-- // <div class="img-fluid loader"> -->
                <!-- image loader -->
                <!-- <img src="img/loader.gif" class="img-fluid" width=100%>
    </div>
    <div class="msg"></div> -->


                </section>
                <script src="Profile_js/pagination.js"></script>
                <script src="js/jquery.min.js"></script>
                <script src="js/popper.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/main.js"></script>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Eps Pawn 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
		  
      	if (message == "") return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

       

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("show_comment.php",
          
      		   {
      		   	id_2: <?=$ch['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
</body>

</html>