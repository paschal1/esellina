<?php
session_start();
//db connection goes here -->
include( 'database_connect.php' );
// background page comes in
include( 'index_background.php' );

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <link rel='icon' type='image/png' class='img-fluid' href='epsimage/icon.PNG'>
    <title>search</title>
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

    //$id = $_SESSION['id'];

    $query = ( "SELECT * FROM users   WHERE firstname LIKE  '%$searchq%' OR middlename LIKE  '%$searchq%' OR lastname LIKE  '%$searchq%'  LIMIT 5" ) or die( 'could not search' );
    $statement = $dbconn->prepare( $query );
    $statement ->execute();
    $result = $statement ->fetchAll();
    $output = '';
    if ( empty( $result ) ) {
        echo '<div class="wrapper">Pawn says</div>';
        echo '<div class="wrapper"><span><div id="style"><b>There was no search result!</b></div><span></div>';
    } else {

        foreach ( $result  as $fetch_user_info ) {

            $users = $fetch_user_info['user_id'];
            $user_name = $fetch_user_info[1];
            $user_name2 = $fetch_user_info[2];
            $user_name3 = $fetch_user_info[3];
            $user_Email = $fetch_user_info[5];
            $user_gender = $fetch_user_info[10];

            $query3 = ( "SELECT * FROM user_post WHERE priority ='public' ORDER BY post_id DESC limit 5" ) or die( 'could not search' );
            $statement = $dbconn->prepare( $query3 );
            $statement ->execute();
            $result3 = $statement ->fetchAll();

            foreach ( $result3  as $post_data ) {

                $post_id = $post_data[0];
                $user_id = $post_data[1];
                $post_txt = $post_data[2];
                $post_img = $post_data[7];
                $post_price = $post_data[3];
                $qty = $post_data[4];

                $query2 = "SELECT  *FROM user_profile_pic  WHERE user_id='$users' ORDER BY timeCreated DESC";
                $statement = $dbconn->prepare( $query2 );
                $statement ->execute();
                $result2 = $statement->fetchAll();
                foreach ( $result2 as $fetch_user_pic ) {

                    $user_pic = $fetch_user_pic[2];
                    $user_pic1 = $fetch_user_pic[0];

                    ?>
                                <div class='wrapper'>

                                    <div style='padding-top:15px; padding-bottom:7px;'>
                                        <?php if ( $user_pic != '' ):?>
                                        <span><img src="../uploads/profile/<?php echo $user_pic; ?> " height='40px'
                                                width='40px' class='img-circle' /> </span>
                                        <?php else: ?>
                                        <img src='img/user.jpeg' height='40px' width='40px' class='img-circle'
                                            id='profileDisplay' onclick='triggerClick()' />
                                        <?php endif;
                    ?>
                                        <?php $output .= '<span><button type="button" class="view_user" id="'.$fetch_user_info['user_id'].'" style="border:none; background-color:white;">'.$user_name.'  '.$user_name2.'  '.$user_name3.'</button></span>';
                    ?>
                                        <?php echo $output;
                    ?>
                                    </div>

                                    <?php if ( $post_img != '' ):?>
                                    <img src="../uploads/<?php echo $post_img; ?>" width='450px' height='100px'
                                        class='img-thumbnail' />

                                    <?php else: ?>
                                    <img src='../uploads/default.jpg' width='450px' height='200px'
                                        class='img-thumbnail' />
                                    <?php endif;
                    ?>
                                    <p><?php echo $post_data[2];
                    ?></p>
                                    <p><?php echo $post_data[4].' Item in Stock';
                    ?></p>
                                    <hr>
                                    <span>&#8358;
                                        <?php echo $post_data[3];
                    ?></span>
                                    <?php

                    ?>
                                    <?php

                    //  $to_user_id = $chat['to_user_id'];
                    //= $chat['from_user_id'];
                    $from_user_id = $_SESSION['id'];

                    ?>

                                    <form method='post'>
                                        <span> <a href="user_post_details.php?post_id=<?php echo $post_id;?>"><button
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
</body>

</html>