<?php
session_start();


if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('location:../login.php');
    exit();
}
//db connection goes here -->
include('database_connect.php');
//include functions here.. 
include('functions.php');
include '../app/helpers/users.php';
include '../app/helpers/user.php';
include '../app/helpers/conversations.php';
include '../app/helpers/timeAgo.php';
include '../app/helpers/last_chat.php';

$user = getUser($_SESSION['username'], $dbconn);
$conversations = getConversation($user['user_id'], $dbconn);

//error_reporting(1);

$me = getUsers($_SESSION['id'], $dbconn);

$users = getUsers($user['user_id'], $dbconn);


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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">
    <!-- jquery link -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- // ajax script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_twice.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="rounded-circle" src="img/EPS logo ColouredSVG.svg" alt="...user" width="80px">
                </div>
                <div class="sidebar-brand-text mx-3">Pawn<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="user_page.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                eSellina
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>POST</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Components:</h6>
                        <a class="collapse-item" href="loader.php">Add Post</a>
                        <a class="collapse-item active" href="index_twice.php">View Post</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Settings:</h6>
                        <a class="collapse-item" href="profile.php">Profile</a>
                        <a class="collapse-item" href="">Dark mode</a>
                        <a class="collapse-item" href="user_page.php">Delete Post</a>
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chat Screens:</h6>
                        <a class="collapse-item" href="forgot-password.html">Change Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="../chat.php">Chats</a>
                        <a class="collapse-item" href="chat_members.php">Members</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../pages/user_index.php">
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
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: rgb(245, 113, 4);">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <span class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="searchText" class="form-control bg-light border-0 small" placeholder="Search for..."  >
                            <div class="input-group-append">
                                <button  class="btn btn-light"  id="searchBtn">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <span class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <div class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" id="searchText2" class="form-control bg-light border-0 small" placeholder="Search for..."  >
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="searchBtn">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
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
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter count"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" class="dropdown-menu">
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
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 small" style="color: cornsilk;"><?= $me['firstname'] . ' ' . $me['lastname']; ?></span>
                                <img class="img-profile rounded-circle" src="../uploads/<?= $me['pic']; ?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="pawn_step1/settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="../chat.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Chats
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <ul id="postList" class="list-group mvh-50 overflow-auto">


                        </ul>
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-warning" role="alert"><?php echo htmlspecialchars($_GET['error']); ?></div> <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="success"><?php echo htmlspecialchars($_GET['success']); ?></div> <?php } ?>
                    </div>

                    <?php

                    $query = "SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 40";
                    $statement = $dbconn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $count = $dbconn->query('SELECT * FROM user_post');
                    $num = $count->rowCount();
                    foreach ($result as $loop_key => $rows) {
                        $userid = $rows['user_id'];
                        $post_id = $rows['post_id'];

                        $query1 = "SELECT * FROM users WHERE user_id=$userid";
                        $statement = $dbconn->prepare($query1);
                        $statement->execute();
                        $results = $statement->fetchAll();

                        foreach ($results as $loop_key => $row) {

                    ?>




                            <div class="col d-flex justify-content-center">
                                <div class="card border-none mb-3 center" style="max-width: 30rem;">
                                    <div class="card-body text-success">
                                        <?php if ($row['pic'] != "") : ?> <span>
                                                <img src="../uploads/<?= $row['pic']; ?> " class="img-profile rounded-circle" height="40px" width="40px" class="img-circle" />
                                            </span>
                                        <?php else : ?>
                                            <img src="img/user.jpeg" height="40px" width="100%" class="img-profile rounded-circle" id="profileDisplay" onclick="triggerClick()" />
                                        <?php endif; ?>
                                        <span><button type="button" class="view_user" id="' <?= $row['user_id']; ?> '" style="border:none; background-color:white;"> <?= $row['firstname'] . '  ' . $row['lastname']; ?></button></span>

                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <?php if ($rows['post_pic'] != "") : ?>
                                                        <img src="../uploads/<?php echo $rows['post_pic']; ?>" class="img-thumbnail" width="100%" height="100%" />

                                                    <?php else : ?>
                                                        <img src="../uploads/default.jpg" width="100%" height="200px" class="img-thumbnail" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">

                                                        <p class="card-title">


                                                        </p>
                                                        <p class="card-text"><?php echo $rows[2]; ?></p>
                                                        <p class="card-text"><small class="text-muted"><?php echo $rows[4] . ' Item in Stock'; ?></small>
                                                            <span>$<?php echo $rows[3]; ?>


                                                                <form method="post">
                                                                    <span> <a href="user_post_details.php?post_id=<?php echo $post_id; ?>"><button type="button" class="btn btn-warning btn-xs edit" id="<?php echo $row[1]; ?>">Order</button></a><br>
                                                                </form>




                                                        </p>
                                                        <form method="post" action="" data-sendmessage-form-id="<?php echo $loop_key; ?>">
                                                            <input type="hidden" name="to_id" display="none" value="<?php echo $userid; ?>">

                                                            <input type="hidden" name="message" display="none" value="Is this product <?php echo $rows[2]; ?> still Available">
                                                            <button type="submit" class="btn btn-success btn-round pull-right submit" data-toggle="modal" data-target="#myModal">
                                                                <i class="now-ui-icons shopping_cart-simple"></i>Send
                                                                Message</button>
                                                        </form>


                                                        <!-- here you should either choose to submit call a modal here or submit this form
                                             or do both programmatically from a function -->
                                                        <!-- i set it to calling the modal -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- comment box goes here -->

                                        <button type="button" placeholder="" style="border:none; background-color:white; " id="comment2" width=15%>
                                            <?php if ($row['pic'] != "") : ?>
                                                <img src="../uploads/<?php echo $row['pic']; ?>" class="img-profile rounded-circle" height="20px" width="20px" border-radius="50px" />
                                            <?php else : ?>
                                                <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;" />
                                            <?php endif; ?>

                                            Drop your comment...</button>
                                        <!-- // here goes the comment for
                                    m -->
                                        <!-- this is one of the form causing the issue with this form send comment to user who
                                    post i want the page note to reload when submit button is clicked -->
                                        <form method="post" action="add_comment.php" class="form-group" data-comment-form-id="<?php echo $loop_key; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                            <div class="form-group">
                                                <textarea class="form-input" type="text" style="border:none;" placeholder="comment here..." name="comment_txt" id="comment" row="2" col="3" value=""></textarea>
                                                <input type="submit" class="btn default submit" value="Send" title="submit" name="comment" src="img/sendtext.PNG" id="commentBtn" alt="Send" width=30px height=22px />
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
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                            <!-- Logout Modal-->
                            <div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                            <!-- <script src="Profile_js/pagination.js"></script> -->
                            <script src="js/jquery.min.js"></script>
                            <script src="js/popper.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="js/main.js"></script>
                            <!-- Custom scripts for all pages-->
                            <script src="js/sb-admin-2.min.js"></script>
                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {

                                    $('form[data-sendmessage-form-id]').each(function() {
                                        $(this).submit((e) => {
                                            e.preventDefault();
                                            var form_data = $(this).serialize();
                                            $.ajax({
                                                type: "POST",
                                                url: "../app/ajax/insert.php",
                                                data: form_data,
                                                success: function() {

                                                    // if(data.error != ''){
                                                    alert('message sent');
                                                    $(this).reset();
                                                    //      $('#comment_message').html(data.error);
                                                    // }
                                                }

                                            })
                                        });
                                    });

                                    //comment ajax call 
                                    // $('form[data-comment-form-id]').each(function() {
                                    //     $(this).submit((e) => {
                                    //         e.preventDefault();
                                    //         var form_data = $(this).serialize();
                                    //         $.ajax({
                                    //             type: "POST",
                                    //             url: "add_comment.php",
                                    //             data: form_data,
                                    //             success: function() {
                                    //                 $(this).reset();
                                    //                 alert('comment sent');
                                    //             }

                                    //         })

                                    //     });
                                    // });


                                    // Search
                                    $("#searchText").on("input", function() {
                                        let searchText = $(this).val();
                                         console.log(searchText);

                                        if (searchText == "") return;
                                        $.post('../app/helpers/index_search.php',

                                            {

                                                key: searchText
                                            },
                                            function(data, status) {
                                                $("#postList").html(data);
                                            });
                                        //         console.log(searchText);
                                    });

                                     // Search
                                    $("#searchText2").on("input", function() {
                                        let searchText = $(this).val();
                                         console.log(searchText);

                                        if (searchText == "") return;
                                        $.post('../app/helpers/index_search.php',

                                            {

                                                key: searchText
                                            },
                                            function(data, status) {
                                                $("#postList").html(data);
                                            });
                                        //         console.log(searchText);
                                    });

                                    // Search using the button
                                    $("#searchBtn").on("click", function() {
                                        var searchText = $("#searchText").val();
                                        if (searchText == "") return;
                                        $.post('../app/helper/index_search.php', {
                                                key: searchText
                                            },
                                            function(data, status) {
                                                $("#postList").html(data);
                                            });
                                    });


                                    //auto update last seen
                                    let lastSeenUpdate = function() {
                                        $.get("app/ajax/update_last_seen.php");

                                    }
                                    lastSeenUpdate();

                                    setInterval(lastSeenUpdate, 10000);

                                    //updating the view with notification using ajax
                                    function load_unseen_notification(view = ''){
                                        $.ajax({
                                            url:"../app/helpers/fetch_notify.php",
                                            method:"POST",
                                            data:{view:view},
                                            dataType:"json",
                                            success:function(data){
                                                $('.dropdown-menu').html(data.notification);
                                                if(data.unseen_notification>0){
                                                    $('.count').html(data.unseen_notification);
                                                }
                                            }

                                        });
                                    }
                                    load_unseen_notification();

                                    $('[data-toggle="toggle"]').click(function(){
                                        $(this).parent().next('.hide').toggle();
                                    });

                                });
                            </script>
</body>

</html>