<?php
 //if(isset($_POST['submit'])){
// if($_FILES['file']['name'] !='')
// {
    
//     $extension = end(explode(".",$_FILES['file']['name']));
//     $allowed_type = array("jpg","jpeg","png","gif");

//     if(in_array($extension, $allowed_type))
//     {
//         $new_name = rand() . "." . $extension;
//         $path = "uploads/" . $new_name;

//         if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
//         {
//             echo '
//             <div class="col-md-8">
//             <img src="'.$path.'" class="img-responsive"/>
//             </div>
//             <div class="col-md-4">
//             <button type="button" data-path"'.$path.'" id="remove_button" class="btn btn-danger">x</button>
//             </div>
//             ';  
//         }
//     }else
//     {
//         echo '<script>alert("please select file valid image format!!")</script>';
//     }
// }else
// {
//     echo '<script>alert("please select file")</script>';

// }
//}
?><?php
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

// background page comes in
include("index_background.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" href="epsimage/icon.png" type="image/png">
    <link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eps||post||now</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!-- <script src="Profile_js/Profile.js"> </script> -->
    <!-- <script src="Profile_js/post_index.js"> </script> -->
    <script src="Profile_js/chat.js"> </script>
    <script type="text/javascript" src="jquery.js"> </script>
    <script type="text/javascript" src="jquery.form.js"> </script>

    <script>
    function time_get() {
        d = new Date();
        mon = d.getMonth() + 1;
        time = d.getDate() + "-" + mon + "-" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes();
        posting_pic.post_time.value = time;
    }

    function time_get1() {
        d = new Date();
        mon = d.getMonth() + 1;
        time = d.getDate() + "-" + mon + "-" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes();
        posting_pic1.post_time.value = time;
    }

    $(document).ready(function() {
        $('form').ajaxForm(function() {

        });
    });
    </script>

</head>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body>

    <section>
        <div class="bg">

            <div class="container-fluid">
                <!-- form for searching goes here -->

                <form method="POST" class="navbar-form navbar-right" action="post_index_search.php">
                    <div class="form-group" style="position:absolute;left:75.6%; top:5.18%; font-size:13px; "> <input
                            type="submit" title="Search" class="form-control" value="search"
                            class="form control search-query" src="assets/img/search.png" alt="Search" /></div>
                    <div class="form-group" style="position:absolute;left:81.8%;top:5.2%; "> <input type="text"
                            name="search" class="form-control" class="form control search-query"
                            placeholder="Search Pawn Users" onkeydown="searchq()" style="width:149.5;"></div>
                    <div class="countryList" id="countryList" style="position:absolute; width:235px; z-index:1001;">
                    </div>

                </form>


                <div style="position:absolute;left:85.6%; top:14.8%;"> <a href="chat.php" style="text-decoration:none;">
                        <input type="button" value="Chats" id="sign_button" class="btn default"> </a> </div>



                <div style="position:absolute; left:76.4%; top:26.2%;">
                    <font size="4"> Pawn Chats </font>
                </div>
                <div style="position:absolute; left:85%; top:30%; color:black; font-size:11px;">
                    <font face="myFbFont">Meet with People and make more sells. </font>
                </div>

                <div
                    style="position:absolute;left:75.4%; top:32.8%; height:1; width:22.05%; background-color:#CCCCCC; ">

                </div>
                <!-- users details fetched goes here -->
                <div style="position:absolute;left:75.4%; top:32.8%; margin:2px;" class="data">
                    <table class="table" id="tablelettercard">
                        <thead>

                            <div scope="col" style="padding:15px; font-style: inherit;
        font-family: 'Times New Roman', Times, serif; font-size:20px;">Members</div>


                        </thead>
                        <tbody id="userdata">

                        </tbody>
                    </table>



                </div>






                <div class="container">
                    <div class="row">
                        <div>
                            <!-- form for posting goes here -->
                            <div class="container">
                                <!-- i want the page note to reload when submit button is clicked -->

                                <form method="post" action="" enctype="multipart/form-data" name="post_pic" id="">
                                    <div style="position:absolute; left:37.5%; top:21.5%;" class="form-group ">
                                        <textarea class="form-control" style="height:70; width:100%; border:none;"
                                            name="post_txt" maxlength="511" placeholder="Click Upload to add Post"
                                            id="post_txt" readonly></textarea>
                                    </div>
                                    <div style="position:absolute; left:36.3%; top:35%; width:13.9%;"
                                        class="form-group">
                                        <input type="text" name="price" class="form-control"
                                            style="height:30; width:100;" placeholder="Enter Price" id="price">
                                    </div>
                                    <div style="position:absolute; left:44.7%; top:35%; " class="form-group ">
                                        <input type="text" name="qty" class="form-control"
                                            style="height:30; width:55.9%; " placeholder="Enter Qty" id="qty">
                                    </div>
                                    <input type="hidden" name="post_time">
                                    <div style="position:absolute; left:62%; top:35%;" class="form-group ">
                                        <select style="background: transparent; border-bottom:5px; padding: 2px; "
                                            name="priority" class="form-control" id="priority">
                                            <option value="Public"> Public </option>
                                            <option value="Private"> Only me </option>
                                        </select>
                                    </div>
                                    <div style="position:absolute; left:53%; top:35%; ">
                                        <span><img src="img/download.JPEG" style=" height:20px; width:20px;"
                                                id="post_img" onclick="triggerClick()" /> Add Photo </span>
                                    </div>
                                    <div style="position:absolute; left:34%; top:65%;" class="form-group"
                                        id="error_profileImage">
                                        <input type="file" id="profileImage" id="postimage"
                                            onchange="displayImage(this)" name="post_pic" style="display:none;"
                                            multiple>
                                    </div>
                                    <div style="position:absolute; left:69.5%; top:25%; " id="upload"
                                        class="form-group">

                                        <a href="loader.php"><input class="btn btn btn-default subm" it" type="button"
                                                value="Upload" name="file" id="profileImage" onClick="time_get()" /></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="position:absolute;left:37.4%; top:40%; height:1; width:37.05%;">
                        <br>


                        <div>

                            <div class="table-responsive" id="image_table">

                                <?php



                                //fetched first 4 data from db for pagination from user post
                                $query = ("SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 0, 4");
                                $statement = $dbconn->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                $count = $dbconn->query('SELECT * FROM user_post');
                                $num = $count->rowCount();

                                ?>
                                <?php echo '<span style="color:green;">Users have</span> ' . $num . ' <span style="color:green;">items to be sold in our website <p>Buy now or Add yours</p></span>'; ?>
                                <?php
                                foreach ($result as $post_data) {

                                    $post_id = $post_data[0];
                                    $user_id = $post_data[1];
                                    $post_txt = $post_data[2];
                                    $post_img = $post_data[7];
                                    $post_price = $post_data[3];
                                    $qty = $post_data[4];


                                    // from users table
                                    $query = "SELECT * FROM users WHERE user_id= '$user_id'";
                                    $statement = $dbconn->prepare($query);
                                    $statement->execute();
                                    $result1 = $statement->fetchAll();
                                    foreach ($result1 as $fetch_user_info) {
                                        $users = $fetch_user_info['user_id'];
                                        $user_name = $fetch_user_info[1];
                                        $user_name2 = $fetch_user_info[2];
                                        $user_name3 = $fetch_user_info[3];
                                        $user_Email = $fetch_user_info[5];
                                        $user_gender = $fetch_user_info[10];

                                        $output = "";

                                        //from profile pic table
                                        $query = "SELECT  *FROM user_profile_pic  WHERE user_id='$users' ORDER BY timeCreated DESC";
                                        $statement = $dbconn->prepare($query);
                                        $statement->execute();
                                        $result2 = $statement->fetchAll();
                                        foreach ($result2 as $loop_key => $fetch_user_pic) {

                                            $user_pic = $fetch_user_pic[2];
                                            $user_pic1 = $fetch_user_pic[0];

                                            $ids = $_SESSION['id'];
                                            $query = "SELECT  *FROM user_profile_pic  WHERE user_id='$ids' ORDER BY timeCreated DESC";
                                            $statement = $dbconn->prepare($query);
                                            $statement->execute();
                                            $result6 = $statement->fetchAll();
                                            foreach ($result6 as $fetch_user_pic) {

                                                $user_pic2 = $fetch_user_pic[2];
                                                $user_pic1 = $fetch_user_pic[0];
                                ?>


                                <div class="container ">

                                    <div style="padding-top:4px; padding-bottom:7px;">
                                        <?php if ($user_pic != "") : ?>
                                        <span><img src="../uploads/profile/<?php echo $user_pic; ?> " height="40px"
                                                width="40px" class="img-circle" /> </span>
                                        <?php else : ?>
                                        <img src="img/user.jpeg" height="40px" width="100%" class="img-circle"
                                            id="profileDisplay" onclick="triggerClick()" />
                                        <?php endif; ?>
                                        <?php $output .= '<span><button type="button" class="view_user" id="' . $fetch_user_info['user_id'] . '" style="border:none; background-color:white;">' . $user_name . '  ' . $user_name2 . '  ' . $user_name3 . '</button></span>'; ?>
                                        <?php echo $output; ?>
                                    </div>

                                    <?php if ($post_img != "") : ?>
                                    <img src="../uploads/<?php echo $post_img; ?>" width="50%" height="10px"
                                        class="img-thumbnail" />

                                    <?php else : ?>
                                    <img src="../uploads/default.jpg" width="100%" height="200px"
                                        class="img-thumbnail" />
                                    <?php endif; ?>
                                    <p><?php echo $post_data[2]; ?></p>
                                    <p><?php echo $post_data[4] . ' Item in Stock'; ?></p>
                                    <hr>
                                    <span>&#8358;<?php echo $post_data[3]; ?></span>
                                    <?php

                                                    ?>
                                    <?php


                                                    //  $to_user_id= $chat['to_user_id'];
                                                    //= $chat['from_user_id'];
                                                    $from_user_id = $_SESSION['id'];

                                                    ?>


                                    <form method="post">
                                        <span> <a href="user_post_details.php?post_id=<?php echo $post_id; ?>"><button
                                                    type="button" class="btn btn-warning btn-xs edit"
                                                    id="<?php echo $post_data[1]; ?>">Order</button></a>
                                    </form>
                                    <!-- this is one of the form causing the issue with this form send message to user who
                                    post i want the page note to reload when submit button is clicked -->
                                    <form method="post" action="" data-sendmessage-form-id="<?php echo $loop_key; ?>">
                                        <input type="hidden" name="to_user_id" display="none"
                                            value="<?php echo $user_id;?>">

                                        <input type="hidden" name="from_user_id" display="none"
                                            value="<?php echo $from_user_id;?>">
                                        <input type="hidden" name="chat_message" display="none"
                                            value="Is this Available">
                                        <button type="submit" name="send_message"
                                            class="btn btn-success btn-round pull-center submit" data-toggle="modal"
                                            data-target="#myModal">
                                            <i class="now-ui-icons shopping_cart-simple"></i>Send Message</button>
                                    </form>

                                    <!-- here you should either choose to submit call a modal here or submit this form
                                             or do both programmatically from a function -->
                                    <!-- i set it to calling the modal -->

                                    </span>

                                    <?php

                                                    //comment box goes here
                                                    //require("comment1.php");
                                                    ?>
                                    <button type="button" placeholder="" style="border:none; background-color:white; "
                                        id="comment2" width=15%>
                                        <?php if ($user_pic != "") : ?>
                                        <img src="../uploads/profile/<?php echo $user_pic2; ?> " height="20px"
                                            width="20px" border-radius="50px" />
                                        <?php else : ?>
                                        <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;" />
                                        <?php endif; ?>
                                        <?php } ?>
                                        Drop your comment...</button>
                                    <!-- // here goes the comment for
                                    m -->
                                    <!-- this is one of the form causing the issue with this form send comment to user who
                                    post i want the page note to reload when submit button is clicked -->
                                    <form method="post" action="" class="form-group"
                                        data-comment-form-id="<?php echo $loop_key; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                        <div class="form-group">
                                            <textarea class="form-input" type="text" style="border:none;"
                                                placeholder="comment here..." name="comment_txt" id="comment" row="2"
                                                col="3" value=""></textarea>
                                            <input type="submit" class="btn default submit" value="Send" title="submit"
                                                name="subcomment" src="img/sendtext.PNG" alt="Send" width=30px
                                                height=22px />
                                            <i class="bi bi-cursor"></i>
                                    </form>
                                </div>
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
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"><img
                                        src="../uploads/profile/<?php echo $user_pic; ?> " height="20px" width="20px"
                                        border-radius="50px" />
                                    <?php echo '<b>' . $user_name . '</b>'; ?>
                                    <?php echo '<b>' . $user_name2 . '</b>'; ?>
                                    <?php echo '<b>' . $user_name3 . '</b>'; ?>
                                    <?php echo $cline1; ?></td>
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
                                                }
                                ?>

                            <?php
                                            }
                                        }
                                    }
                                }

                ?>
                            <div class="img-fluid loader">
                                <!-- image loader -->
                                <img src="img/loader.gif" class="img-fluid" width=100%>
                            </div>
                            <div class="msg"></div>
                        </div>

                    </div>
                </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- unnecessary jquery import
         you can uncomment the import below
         if it's a script you wrote yourself -->

    <!-- <script src='js/jquery.js'></script> -->
    <script>
    function triggerClick() {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.querySelector('#post_img').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    //script for pagination or infinite scrolling
    $(document).ready(function() {
        $('.loader').hide();
        var load = 0;
        var num = "<?php echo $num; ?>";
        $(window).scroll(function() {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                $('.loader').show();
                load++;
                if (load * 4 > num) {
                    $('.msg').text("No more data");
                    $('.loader').hide();
                } else {
                    $.post("fetch.php", {
                        load: load
                    }, function(data) {
                        $('#image_table').append(data);
                        $('.loader').hide();
                    });
                }
            }
        })


        $(document).on('click', '.view_user', function() {
            var user_id = $(this).attr('id');
            if (confirm("Wants to view Profile")) {
                $.ajax({
                    url: "view_profile.php",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    success: function(data) {
                        $("#userprofile").html(data);
                    }
                })
            }
        });
    });
    </script>
</body>
<!--   Core JS Files   -->

<!-- unnecessary jquery import
         you can uncomment the import below
         if it's a script you wrote yourself -->

<!-- <script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script> -->


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
<script type="text/javascript">
$(document).ready(function() {
    // the body of this function is in assets/js/now-ui-kit.js
    nowuiKit.initSliders();
});

function scrollToDownload() {

    if ($('.section-download').length != 0) {
        $("html, body").animate({
            scrollTop: $('.section-download').offset().top
        }, 1000);
    }
}

// Here is where i wrote the javascript to prevent page reload for comment form
$(document).ready(function() {

    $('form[data-comment-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_comment.php",
                data: form_data,
                success: function() {
                    $(this).reset();
                    alert('comment sent');
                }

            })

        });
    });

    // Here is where i wrote the javascript to prevent page reload for sendMessage button  
    $('form[data-sendmessage-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "quickmessage.php",
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

    // Here is where i wrote the javascript to prevent page reload for Uploading button

    $('#formdata').submit((e) => {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                $('#postimage').val();
                $(this).reset();
                alert('post sent');

            }

        })
    });


});
</script>
<!-- <script type="text/javascript" src="Profile_js/allsend.js"> -->


</script>
<script type="text/javascript" src="Profile_js/pagination.js"></script>

</html>