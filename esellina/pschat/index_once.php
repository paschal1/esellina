<?php
session_start();


// if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
//     header('location:../pages/user_login_page.php');
//     exit();
// }
//db connection goes here -->
include('database_connect.php');
//include functions here.. 
include('functions.php');
//error_reporting(1);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Epspawn menu </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="shortcut icon" href="epsimage/icon.png" type="image/png">
    <link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- bootstrapcdn links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery link -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- // ajax script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body>
    <section class="ftco-section">
        <!-- <div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Website menu #02</h2>
				</div>
			</div>
		</div> -->

        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <a class="navbar-brand" href="index.html"><img src="epsimage/icon.png" width="70" alt="EPS">
                        <span>Pawn</span></a>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <form action="post_index_search.php" method="post" class="searchform order-lg-last">
                    <div class="form-group d-flex">
                        <input type="text" name="search" class="form-control pl-3" placeholder="Search">
                        <button type="submit" placeholder="" name="search" class="form-control search"><span
                                class="fa fa-search"></span></button>
                    </div>
                </form>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a href="../pages/user_index.php" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">You</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="pawn_step1/user_settings1.php">Profile</a>
                                <a class="dropdown-item" href="loader.php">Add Post</a>
                                <a class="dropdown-item" href="status.php">Goods Area</a>
                                <a class="dropdown-item" href="chat.php">Chats</a>
                                <a class="dropdown-item" href="action2.php">Partners</a>
                                <a class="dropdown-item" href="index_once.php">Product Feeds</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="../../website/website/page/product.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item"><a href="../../website/website/page/services.php"
                                class="nav-link">Services</a>
                        </li>
                        <li class="nav-item"><a href="../../website/website/page/contactus.php"
                                class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->



        <!-- <div class="container"> -->

        <?php

            $query = "SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 40";
            $statement = $dbconn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $count = $dbconn->query('SELECT * FROM user_post');
            $num = $count->rowCount();
            foreach ($result as $loop_key => $rows){
            $userid = $rows['user_id'];
            $post_id = $rows['post_id'];




             $query2 = "SELECT  *FROM user_profile_pic  WHERE user_id='$userid' ORDER BY timeCreated DESC";
                $statement = $dbconn->prepare( $query2 );
                $statement ->execute();
                $result2 = $statement->fetchAll();
                foreach ( $result2 as $loop_key => $fetch_user_pic ) {

                     $image = $fetch_user_pic ['image'];
                     
        $query1="SELECT * FROM users WHERE $userid = user_id";
        // $query1="SELECT users.firstname, users.middlename, users.lastname, user_profile_pic.image FROM users, user_profile_pic WHERE $userid = users.user_id=user_profile_pic.user_id ORDER BY user_profile_pic.timeCreated"; 
        $statement = $dbconn->prepare($query1);
        $statement->execute();
        $result1 = $statement->fetchAll();
        foreach($result1 as $loop_key => $row){


        
        $user_name = $row['firstname'];
       $user_name2 =$row['middlename'];
       $user_name3 =$row['lastname'];
       $output ='';

    

               

           ?>




        <div class="col d-flex justify-content-center">


            <div class="card border-none mb-3 center" style="max-width: 30rem;">

                <div class="card-body text-success">
                    <?php if ($fetch_user_pic['image'] != "") : ?> <span>
                        <img src="../uploads/profile/<?php echo $image; ?> " height="40px" width="40px"
                            class="img-circle" />
                    </span>
                    <?php else : ?>
                    <img src="img/user.jpeg" height="40px" width="100%" class="img-circle" id="profileDisplay"
                        onclick="triggerClick()" />
                    <?php endif; ?>
                    <?php $output .= '<span><button type="button" class="view_user" id="' . $rows['user_id'] . '" style="border:none; background-color:white;">' . $user_name . '  ' . $user_name2 . '  ' . $user_name3 . '</button></span>'; ?>
                    <?php echo $output; ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if ($rows['post_pic'] != "") : ?>
                                <img src="../uploads/<?php echo $rows['post_pic']; ?>" width="100%" height="100%" />

                                <?php else : ?>
                                <img src="../uploads/default.jpg" width="100%" height="200px" class="img-thumbnail" />
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <p class="card-title">


                                    </p>
                                    <p class="card-text"><?php echo $rows[2]; ?></p>
                                    <p class="card-text"><small
                                            class="text-muted"><?php echo $rows[4] . ' Item in Stock'; ?></small>
                                        <span>&#8358;<?php echo $rows[3]; ?>


                                            <form method="post">
                                                <span> <a
                                                        href="user_post_details.php?post_id=<?php echo $post_id; ?>"><button
                                                            type="button" class="btn btn-warning btn-xs edit"
                                                            id="<?php echo $row[1]; ?>">Order</button></a><br>
                                            </form>

                                            <!-- this is one of the form causing the issue with this form send message to user who
                                    post i want the page note to reload when submit button is clicked -->


                                    </p>
                                    <form method="post" action="" data-sendmessage-form-id="<?php echo $loop_key; ?>">
                                        <input type="hidden" name="to_user_id" display="none"
                                            value="<?php echo $user_id;?>">

                                        <input type="hidden" name="from_user_id" display="none"
                                            value="<?php echo $from_user_id;?>">
                                        <input type="hidden" name="chat_message" display="none"
                                            value="Is this Available">
                                        <button type="submit" name="send_message"
                                            class="btn btn-success btn-round pull-right submit" data-toggle="modal"
                                            data-target="#myModal">
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


                    <button type="button" placeholder="" style="border:none; background-color:white; " id="comment2"
                        width=15%>
                        <?php if ($fetch_user_pic['image'] != "") : ?>
                        <img src="../uploads/profile/<?php echo $image; ?>" height="20px" width="20px"
                            border-radius="50px" />
                        <?php else : ?>
                        <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;" />
                        <?php endif; ?>

                        Drop your comment...</button>
                    <!-- // here goes the comment for
                                    m -->
                    <!-- this is one of the form causing the issue with this form send comment to user who
                                    post i want the page note to reload when submit button is clicked -->
                    <form method="post" action="add_comment.php" class="form-group"
                        data-comment-form-id="<?php echo $loop_key; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <div class="form-group">
                            <textarea class="form-input" type="text" style="border:none;" placeholder="comment here..."
                                name="comment_txt" id="comment" row="2" col="3" value=""></textarea>
                            <input type="submit" class="btn default submit" value="Send" title="submit" name="comment"
                                src="img/sendtext.PNG" alt="Send" width=30px height=22px />
                            <i class="bi bi-cursor"></i>
                    </form>
                    <?php
                                                $query = "SELECT * FROM user_post_comment WHERE post_id=$post_id ORDER BY comment_id";
                                                $statement = $dbconn->prepare($query);
                                                $statement->execute();
                                                $result4 = $statement->fetchAll();
                                                $count = $statement->rowCount();
                                                ?>

                    <span> &nbsp; <input type="button" value="Comment(<?php echo $count; ?>)"
                            style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;"
                            onClick="Comment_focus(<?php echo $post_id; ?>);"
                            onMouseOver="Comment_underLine(<?php echo $post_id; ?>)"
                            onMouseOut="Comment_NounderLine(<?php echo $post_id; ?>)"
                            id="comment<?php echo $post_id; ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="color:#999999;"> </span>
                    </span>
                </div>

                <?php
                                            foreach ($result4 as $comment_data) {
                                                $comment_id = $comment_data[0];
                                                $comment_user_id = $comment_data[1];
                            ?>
                <?php
                                                $clen = strlen($comment_data[3]);
                                                if ($clen > 0 && $clen <= 60) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                ?>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <img src="../uploads/profile/<?php echo $image; ?> " height="20px" width="20px"
                            border-radius="50px" />
                        <?php echo '<b>' . $user_name . '</b>'; ?>
                        <?php echo '<b>' . $user_name2 . '</b>'; ?>
                        <?php echo '<b>' . $user_name3 . '</b>'; ?>
                        <?php echo $cline1; ?>
                    </td>
                </tr>
                <?php
                                                } else if ($clen > 60 && $clen <= 120) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                ?>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <?php echo $cline1; ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4"> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <?php echo $cline2; ?></td>
                </tr>
                <?php
                                                } else if ($clen > 120 && $clen <= 180) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                ?>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <?php echo $cline1; ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4"> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <?php echo $cline2; ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td bgcolor="#EDEFF4"> </td>
                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                        <?php echo $cline3; ?></td>
                </tr>
                <?php
                                                } else if ($clen > 180 && $clen <= 240) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                ?>
                <table>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline4; ?>
                        </td>
                    </tr>
                    <?php
                                                } else if ($clen > 240 && $clen <= 300) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
                                    ?>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline4; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline5; ?>
                        </td>
                    </tr>
                    <?php
                                                } else if ($clen > 300 && $clen <= 360) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
                                                    $cline6 = substr($comment_data[3], 300, 60);
                                    ?>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline4; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline5; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline6; ?>
                        </td>
                    </tr>
                    <?php
                                                } else if ($clen > 360 && $clen <= 420) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
                                                    $cline6 = substr($comment_data[3], 300, 60);
                                                    $cline7 = substr($comment_data[3], 360, 60);
                                    ?>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline4; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline5; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline6; ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td bgcolor="#EDEFF4"> </td>
                        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                            <?php echo $cline7; ?>
                        </td>
                    </tr>
                </table>
                <?php
                               }       }
                                ?>
            </div>

        </div>

        </div>





        <!-- </div> -->

        <?php

        }
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

</body>

</html>