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
//error_reporting(1);
 require_once('../../geoplugin.class/geoplugin.class.php');

$geoplugin = new geoPlugin();

//locate the IP
$geoplugin->locate();

include('http://www.geoplugin.net/php.gp?ip='.$ip);
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <title>Sellina Upload</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">


</head>

<body class="h-100">
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
                        <span>eSellina</span></a>
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
                        <input type="text" class="form-control pl-3" placeholder="Search">
                        <button type="submit" placeholder="" class="form-control search"><span
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
                                <a class="dropdown-item" href="../chat.php">Chats</a>
                                <a class="dropdown-item" href="../chat.php">Partners</a>
                                <a class="dropdown-item" href="index_twice.php">Product Feeds</a>
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




        <!-- form for posting goes here -->

        <!-- i want the page note to reload when submit button is clicked -->
        <div class="container h-100" style="padding:15px;">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">

                  <form method="post" action="upload.php" enctype="multipart/form-data">
             <label for="" class="form-group ">
                  Say your Mind:</br>
            <input type="text" name="post_txt" placeholder="Product name and more..." class="form-control"> 
             </label> 
             <label class="form-group">
             <input type="number" name="price" placeholder="Your price" class="form-control">        
             </label>
             <label for="" class="form-group ">
             <input type="number" name="qty" placeholder="Number in stock" class="form-control"> 
             </label>
             <input type="hidden" name="latitude" value="<?php echo $geoplugin->latitude;?>"> 
             <input type="hidden" name="longitute" value="<?php echo  $geoplugin->longitude;?>" > 
             <label for="" class="form-group ">
                <select name="priority" class="form-control" id="priority">
                <option value="Public">Public </option>
                <option value="Private">Only me </option>
                </select>
                            </label>
             <label for="" class="form-group ">
                <span><img src="img/download.JPEG" style=" height:20px; width:20px;" id="post_img"  onclick="triggerClick()" />Add Photo </span>
                </label>
                <label for="" class="form-group ">
                <input type="file" id="profileImage" id="postimage" onchange="displayImage(this)" name="post_pic1" style="display:none;" multiple>
                </label></br>
             <input type="submit" name="post" value="Upload" class="btn btn-warning">
                   
                </form>

                    
                </div>

            </div>

        </div>


        <!-- <div class="wrapper1"> -->
        <?php



                                //fetched first 4 data from db for pagination from user post
                                // $query = ("SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 0, 4");
                                // $statement = $dbconn->prepare($query);
                                // $statement->execute();
                                // $result = $statement->fetchAll();
                                // $count = $dbconn->query('SELECT * FROM user_post');
                                // $num = $count->rowCount();

                                ?>
        <?php
        //  echo '<span style="color:green;">Users have</span> ' . $num . ' <span style="color:green;">items to be sold in our website <p>Buy now or Add yours</p></span>'; 
         ?>
        <?php
                                // foreach ($result as $post_data) {

                                //     $post_id = $post_data[0];
                                //     $user_id = $post_data[1];
                                //     $post_txt = $post_data[2];
                                //     $post_img = $post_data[7];
                                //     $post_price = $post_data[3];
                                //     $qty = $post_data[4];

                                    
                                //     // from users table
                                //     $query = "SELECT * FROM users WHERE user_id= '$user_id'";
                                //     $statement = $dbconn->prepare($query);
                                //     $statement->execute();
                                //     $result1 = $statement->fetchAll();
                                //     foreach ($result1 as $fetch_user_info) {
                                //         $users = $fetch_user_info['user_id'];
                                //         $user_name = $fetch_user_info[1];
                                //         $user_name2 = $fetch_user_info[2];
                                //         $user_name3 = $fetch_user_info[3];
                                //         $user_Email = $fetch_user_info[5];
                                //         $user_gender = $fetch_user_info[10];
                                //             $output = "";

                                            
                                         //from profile pic table
                                        // $query = "SELECT  *FROM user_profile_pic  WHERE user_id='$users' ORDER BY timeCreated DESC";
                                        // $statement = $dbconn->prepare($query);
                                        // $statement->execute();
                                        // $result2 = $statement->fetchAll();
                                        // foreach ($result2 as $loop_key => $fetch_user_pic) {

                                        //     $user_pic = $fetch_user_pic[2];
                                        //     $user_pic1 = $fetch_user_pic[0];


?>
        <!-- <div class=" wrapper">
        <div style="padding-top:4px; padding-bottom:7px;">
            <?php 
            // if ($user_pic != "") : 
                ?>
            <span><img src="../uploads/profile/<?php 
            // echo $user_pic; 
            ?> " height="40px" width="40px"
                    class="img-circle" /> </span>
            <?php 
            // else :
                
                 ?>
            <img src="img/user.jpeg" height="40px" width="100%" class="img-circle" id="profileDisplay"
                onclick="triggerClick()" />
            <?php 
            // endif;
             ?>
            <?php
            //  $output .= '<span><button type="button" class="view_user" id="' . $fetch_user_info['user_id'] . '" style="border:none; background-color:white;">' . $user_name . '  ' . $user_name2 . '  ' . $user_name3 . '</button></span>'; 
             ?>
            <?php 
            // echo $output; 
            // ?>
        </div>

        <?php 
        // if ($post_img != "") : 
            ?>
        <img src="../uploads/<?php
        //  echo $post_img; 
        //  ?>" width="50%" height="10px" class="img-thumbnail" />

        <?php 
        // else :
             ?>
        <img src="../uploads/default.jpg" width="100%" height="200px" class="img-thumbnail" />
        <?php 
        // endif; 
        ?>
        <p><?php
        // 
        //  echo $post_data[2]; 
         ?></p>
        <p><?php 
        // echo $post_data[4] . ' Item in Stock';
         ?></p>

        <span>&#8358;<?php
        //  echo $post_data[3]; $from_user_id = $_SESSION['id'];
        ?>

        </span>
        <form method="post">
            <span> <a href="user_post_details.php?post_id=<?php 
            // echo $post_id; 
            // ?>"><button type="button"
                        class="btn btn-warning btn-xs edit" id="<?php 
                        // echo $post_data[1]; 
                        ?>">Order</button></a>
        </form> -->
        <!-- this is one of the form causing the issue with this form send message to user who
                                    post i want the page note to reload when submit button is clicked -->
        <!-- <form method="post" action="" data-sendmessage-form-id="<?php 
    // echo $loop_key; 
    ?>">
                <input type="hidden" name="to_user_id" display="none" value="<?php 
                // echo $user_id;
                ?>">

                <input type="hidden" name="from_user_id" display="none" value="<?php
                //  echo $from_user_id;
                //  ?>">
                <input type="hidden" name="chat_message" display="none" value="Is this Available">
                <button type="submit" name="send_message" class="btn btn-success btn-round pull-right submit"
                    data-toggle="modal" data-target="#myModal">
                    <i class="now-ui-icons shopping_cart-simple"></i>Send Message</button>
            </form>

            <!-- here you should either choose to submit call a modal here or submit this form
                                             or do both programmatically from a function -->
        <!-- i set it to calling the modal -->

        <!-- </span> -->



        <!-- comment box goes here -->


        <!-- <button type="button" placeholder="" style="border:none; background-color:white; " id="comment2" width=15%>
                <?php 
                // if ($user_pic != "") :
                     ?>
                <img src="../uploads/profile/<?php
                //  echo $user_pic2;
                 ?> " height="20px" width="20px"
                    border-radius="50px" />
                <?php 
                // else : 
                ?>
                <img src="img/user.jpeg" style=" height:20; width:20; border-radius:50px;" />
                <?php 
                // endif;
                
                 ?>

                Drop your comment...</button> -->
        <!-- // here goes the comment for
                                    m -->
        <!-- this is one of the form causing the issue with this form send comment to user who
                                    post i want the page note to reload when submit button is clicked -->
        <!-- <form method="post" action="" class="form-group" data-comment-form-id="<?php echo $loop_key; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <div class="form-group">
                    <textarea class="form-input" type="text" style="border:none;" placeholder="comment here..."
                        name="comment_txt" id="comment" row="2" col="3" value=""></textarea>
                    <input type="submit" class="btn default submit" value="Send" title="submit" name="subcomment"
                        src="img/sendtext.PNG" alt="Send" width=30px height=22px />
                    <i class="bi bi-cursor"></i>
            </form>

        </div>
        <hr>

    </div>
    </div> -->
        <?php 
    // } } } 
    ?>



        <!-- // <div class="img-fluid loader"> -->
        <!-- image loader -->
        <!-- <img src="img/loader.gif" class="img-fluid" width=100%>
    </div>
    <div class="msg"></div> -->
        <!-- <script src='Profile_js/pagination.js'></script> -->

    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>





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
</script>

</html>