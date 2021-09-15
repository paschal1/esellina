<?php
session_start();
//db connection goes here -->
include( 'database_connect.php' );


?>
<!doctype html>
<html lang="en">

<head>
    <title>Epspawn Search </title>
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
    <style>
    .wrapper {
        width: 500px;
        margin: 0 auto;
        margin-top: 70px;
        padding: 15px;
    }

    #style {
        color: red;
        width: 500px;
        margin: 0 auto;

    }

    h2 {
        margin-left: 20px;
    }

    @media (max-width: 900px) {
        .wrapper {
            font-size: 20px;
            padding: 10px;
        }
    }

    @media (max-width: 600px) {
        .carousel-caption {
            display: none;
        }

        #icon {
            max-width: 150px;
        }

        h4 {
            font-size: 1.7em;
        }

    }
    </style>
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
        <br>
        <div class='main'>
            <div class='section section-basic'>

                <div class='section' id='carousel'>
                    <div class='container'>
                        <h2></h2>
                        <a class='btn btn-edit btn-round' href='post_index.php'><i
                                class='now-ui-icons arrows-1_minimal-left'></i> &nbsp Back to index</a>
                        <hr color='orange'>
                        <div class='col-md-12'>
                            <div class='row justify-content-center'>
                                <div class='col-8'>

                                    <?php

if ( isset( $_POST['search'] ) ) {

    $searchq = $_POST['search'];
    $searchq = preg_replace( '#[^0-9a-z]#i', '', $searchq );
    // var_dump($searchq);

    //$id = $_SESSION['id'];

    $query1 = ( "SELECT * FROM `users` WHERE `firstname` LIKE  '%$searchq%' OR `middlename` LIKE  '%$searchq%' OR `lastname` LIKE  '%$searchq%'  " ) or die( 'could not search' );
    $statement = $dbconn->prepare($query1);
        $statement->execute();
        $result1 = $statement->fetchAll();
        
       $output ='';
    if ( empty( $result1 ) ) {
        echo '<div class="wrapper">Pawn says</div>';
        echo '<div class="wrapper"><span><div id="style"><b>There was no search result!</b></div><span></div>';
    } else {

        foreach($result1 as $loop_key => $row){


        
        $user_name = $row['firstname'];
       $user_name2 =$row['middlename'];
       $user_name3 =$row['lastname'];

            $query = "SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC LIMIT 10";
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
                foreach ( $result2 as $fetch_user_pic ) {

                     $image = $fetch_user_pic ['image'];

                    ?>
                                    <div class='wrapper'>

                                        <div style='padding-top:15px; padding-bottom:7px;'>
                                            <?php if ( $image != '' ):?>
                                            <span><img src="../uploads/profile/<?php echo $image; ?> " height='40px'
                                                    width='40px' class='img-circle' /> </span>
                                            <?php else: ?>
                                            <img src='img/user.jpeg' height='40px' width='40px' class='img-circle'
                                                id='profileDisplay' onclick='triggerClick()' />
                                            <?php endif;
                    ?>
                                            <?php $output .= '<span><button type="button" class="view_user" id="'.$row['user_id'].'" style="border:none; background-color:white;">'.$user_name.' '.$user_name2.' '.$user_name3.'</button></span>';
                    ?>
                                            <?php echo $output;
                    ?>
                                        </div>

                                        <?php if ( $rows['post_pic'] != '' ):?>
                                        <img src="../uploads/<?php echo $rows['post_pic']; ?>" width='450px'
                                            height='100px' class='img-thumbnail' />

                                        <?php else: ?>
                                        <img src='../uploads/default.jpg' width='450px' height='200px'
                                            class='img-thumbnail' />
                                        <?php endif;
                    ?>
                                        <p><?php echo $rows[2];
                    ?></p>
                                        <p><?php echo $rows[4].' Item in Stock';
                    ?></p>
                                        <hr>
                                        <span>&#8358;
                                            <?php echo $rows[3];
                    ?></span>
                                        <?php

                    ?>
                                        <?php

                    //  $to_user_id = $chat['to_user_id'];
                    //= $chat['from_user_id'];
                    $from_user_id = $_SESSION['id'];

                    ?>

                                        <form method='post'>
                                            <span> <a
                                                    href="user_post_details.php?post_id=<?php echo $post_id;?>"><button
                                                        type='button' class='btn btn-warning btn-xs edit'
                                                        id="<?php echo $post_data[1];?>">Order</button></a>
                                        </form>
                                        <form method='post'>
                                            <input type='hidden' name='to_user_id' display='none'
                                                value="<?php echo $user_id;?>">

                                            <input type='hidden' name='from_user_id' display='none'
                                                value="<?php echo $from_user_id;?>">
                                            <input type='hidden' name='chat_message' display='none'
                                                value='Is this Available'>
                                            <button type='submit' name='send_message'
                                                class='btn btn-success btn-round pull-right' data-toggle='modal'
                                                data-target='#myModal'>
                                                <i class='now-ui-icons shopping_cart-simple'></i>Send Message</button>
                                        </form>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                }
            }
        }

    }
}
?>

    </section>
    <script src='Profile_js/pagination.js'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>