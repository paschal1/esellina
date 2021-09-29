<?php
session_start();
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['update']))
{   

    $id = $_SESSION['id'];
    $post_id = mysqli_real_escape_string($dbconn, $_POST['post_id']);
    $post_txt = mysqli_real_escape_string($dbconn, $_POST['post_txt']);
    $price = mysqli_real_escape_string($dbconn, $_POST['price']);
    $post_qty = mysqli_real_escape_string($dbconn, $_POST['qauntity']);
    $priority = mysqli_real_escape_string($dbconn, $_POST['priority']); 
    

    // checking empty fields

    if(empty($post_txt) || empty($price) || empty($post_qty) || empty($priority)) {    
            
        if(empty($post_txt)) {
            echo "<font color='red'>Post Message field is empty!</font><br/>";
        }
        
        if(empty($price)) {
            echo "<font color='red'>Post price field is empty!</font><br/>";
        }

        if(empty($post_qty)) {
            echo "<font color='red'>Post qauntity field is empty!</font><br/>";
        }
        
           
       
    } else {    





        //updating the table
        $query = "UPDATE user_post SET post_txt='$post_txt',price ='$price',qauntity='$post_qty',priority='$priority' WHERE post_id = '$post_id'";
        $result = mysqli_query($dbconn,$query);
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
        header("Location: user_page.php");
        }
        
    }
}
?>






<?php
//getting id from url
$post_id=isset($_GET['post_id']) ? $_GET['post_id'] : die('ERROR: Record ID not found.');
//selecting data associated with this particular id
$result = mysqli_query($dbconn, "SELECT * FROM user_post WHERE post_id=$post_id");
while($res = mysqli_fetch_array($result))
{
    $post_txt = $res['post_txt'];
    $price = $res['price'];
    $post_qty = $res['qauntity'];
    $priority = $res['priority'];
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Electricks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your projects -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body class="index-page sidebar-collapse">

    <!-- End Navbar -->
    <div class="wrapper">

<br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2> Post Information</h2>
                      <hr color="orange">
                      <a href='user_page.php' class='btn btn-warning btn-round'>Back to Index</a>
                <br>
                <div class="col-md-12">

    <div class="panel panel-success panel-size-custom">
  <div class="panel-heading"><h3>Update Post</h3></div>
  <div class="panel-body">
    <form action="edit_post_details.php" method="post">
        <div class="form group">
            <input type="hidden" class="form-control" id="prod_id" name="post_id" value=<?php echo $_GET['post_id'];?>>
            <label for="prod_name">Post Message:</label>
            <input type="text" class="form-control" id="prod_serial" name="post_txt" value="<?php echo $post_txt;?>">
            <label for="prod_name">Post Price ($):</label>
            <input type="text" class="form-control" id="prod_name" name="price" value="<?php echo $price;?>">
            <!-- <label for="prod_price">Post Image :</label>
            <input type="text" class="form-control" id="prod_price" name="post_pic" value="<?php echo $prod_price;?>"> -->
            <label for="prod_price">Qauntity :</label>
            <input type="text" class="form-control" id="prod_price" name="qauntity" value="<?php echo $post_qty;?>">


                    <div class="form-group">
                        <label for="supp_name">Priority:</label>
                        <div class="input-group">
                            <select class="form-control" id="supplier" name="priority" required>
                              <?php
                            //   include('../config/dbconn.php');
                            //   $query=mysqli_query($dbconn,"SELECT priority FROM user_post ORDER BY priority ASC")or die(mysqli_error());
                            //   while($row=mysqli_fetch_array($query)){
                                  ?>
                                <option value="<?php echo $priority;?>"><?php echo $priority;?></option>
                                <?php //}?>
                            </select>
                        </div>


                        <label for="prod_qty" id="prod_qty" name="prod_qty">Available qauntity: &nbsp &nbsp <?php echo $post_qty;?> Pcs.</label>
                    </div>
                </div>            
             </div>
            </div>
            <br>
            <div class="form group">
                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                    <i class="now-ui-icons ui-1_check"></i> Update Product
                </button>
            </div>
    </form>
  </div>
</div>
</div>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                        <a href="" target="_blank">
                                At your service
                            </a>
                        </li>
                        <li>
                            dstarite@gmail.com
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Serve(5) Starite Technology, Inc.
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
</script>

</html>