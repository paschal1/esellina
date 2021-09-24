<?php
session_start();


if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('location:../../login.php');
    exit();
}
#database connect 
include '../../app/http/connect.php';
#include users function
include '../../app/helpers/users.php';
$me = getUsers($_SESSION['id'], $dbconn);
// check if user details submitted
if(isset($_POST['submit'])){

    // get data from POST request and store them in var
    $p0 = $_SESSION['id'];
    $p1 = $_POST['title'];
    $p2 = $_POST['jtitle'];
    $p3 = $_POST['you'];
    $p4 = $_POST['line1'];
    $p5 = $_POST['line2'];
    $p6 = $_POST['postcode'];
    $p7 =  $_POST['work'];
    $p8 = $_POST['area'];
    $p9 = $_POST['hour'];
    $p10 = $_POST['education'];
    $p11 = $_POST['country'];
    $p12 = $_POST['state'];
    $p13 = $_POST['exp1'];
    $p14 = $_POST['exp2'];

    // checking URL data format

    $data = 'title='.$p1.'jtitle='.$p2.'you='.$p3.'line1='.$p4.'line2='.$p5.'postcode='.$p6.'work='.$p7.'area='.$p8.'hour='.$p9.'education='.$p10.'country='.$p11.'state='.$p12.'exp1='.$p13.'exp2='.$p14;
if(empty($p1)){
    # error message 
    $em = "Title required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em");
    exit;
    }else if(empty($p2)){
        # error message 
    $em = "Job Title required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p3)){
# error message 
    $em = "About You is required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../settings.php?error=$em&$data");
    exit;
    }else if(empty($p4)){
# error message 
    $em = "Address is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p5)){
# error message 
    $em = "Contact Address is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p6)){
# error message 
    $em = "Postcode required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p7)){
# error message 
    $em = "Work Hour is  required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p8)){
# error message 
    $em = "Area is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p9)){
# error message 
    $em = "Hour is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p10)){
    # error message 
    $em = "Education is  required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p11)){
    # error message 
    $em = "country is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p12)){
    # error message 
    $em = "state is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p13)){
        # error message 
    $em = "Experience is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else if(empty($p14)){
    # error message 
    $em = "Experience is required";
    # redirect to 'signup.php' and passing error message
    header("location: settings.php?error=$em&$data");
    exit;
    }else{
            # insert into db
                $sql = "INSERT INTO user_settings (user_id,title,jtitle,you,line1,line2,postcode,work,area,hour,education,country,state,exp1,exp2)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $dbconn->prepare($sql);
                $stmt->execute([$p0,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14]);
        
                 # success message
            $sm = "Profile Created Successfully"; 
            # redirect to 'login.php' and passing success message
            header("location: ../index_twice.php?success=$sm");
            exit;
        
            }
    }


?>

<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Esellina</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>
body {
    background: rgb(236, 144, 5);
}

.form-control:focus {
    box-shadow: none;
    border-color: #5318f5
}

.profile-button {
    background: rgb(23, 20, 196);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #3914df
}

.profile-button:focus {
    background: #3811e7;
    box-shadow: none
}

.profile-button:active {
    background: #1124d4;
    box-shadow: none
}

.back:hover {
    color: #2331f3;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #3a14e4;
    color: #fff;
    cursor: pointer;
    border: solid 1px #291bee
}</style>
                                </head>
                                <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../../uploads/<?= $me['pic']; ?>"><span class="font-weight-bold"><?= $me['firstname'] . ' ' . $me['lastname']; ?></span><span class="text-black-50"><?= $me['email']; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="settings.php" method="POST">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Title</label><input type="text" class="form-control" placeholder="title" value="" name="title"></div>
                    <div class="col-md-6"><label class="labels">Job Title</label><input type="text" class="form-control" value="" placeholder="job title" name="jtitle"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">About You</label><input type="text" class="form-control" placeholder="enter about you" value="" name="you"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter Business address line 1" value="" name="line1"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter Business address line 2" value=""  name="line2"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="Postcode" value="" name="postcode"></div>
                    <div class="col-md-12"><label class="labels">Work days</label> <select  name="work" class="form-control"
                                                     data-error="Please specify your need.">

                                                    <option value="Select Days:"> Select Days: </option>
                                                    <option value="Everyday"> Everyday </option>
                                                    <option value="Monday-Friday"> Monday-Friday </option>
                                                    <option value="Monday-Saturday"> Monday-Saturday </option>
                                                    
                                                </select></div>
                    <div class="col-md-12"><label class="labels">Area Of Business</label><input type="text" class="form-control" placeholder="Area Of Business" value="" name="area"></div>
                    <div class="col-md-12"><label class="labels">Business Hour</label><select  name="hour" class="form-control"
                                                     data-error="Please specify your need.">

                                                    <option value="Select Days:"> Select Hours: </option>
                                                    <option value="1 hour"> 1 hour </option>
                                                    <option value="2 hours"> 2 hours </option>
                                                    <option value="3 hours"> 3 hours </option>
                                                    <option value="4 hours"> 4 hours </option>
                                                    <option value="5 hour"> 5 hours </option>
                                                    <option value="6 hours"> 6 hours </option>
                                                    <option value="7 hours"> 7 hours </option>
                                                    <option value="8 hours"> 8 hours </option>
                                                    <option value="9 hour"> 9 hours </option>
                                                    <option value="10 hours"> 10 hours </option>
                                                    <option value="11 hours"> 11 hours </option>
                                                    <option value="12 hours"> 12 hours </option>
                                                    <option value="13 hour"> 13 hour </option>
                                                    <option value="14 hours"> 14 hours </option>
                                                    <option value="15 hours"> 15 hours </option>
                                                    <option value="16 hours"> 16 hours </option>
                                                    <option value="17 hour"> 17 hours </option>
                                                    <option value="18 hours"> 18 hours </option>
                                                    <option value="19 hours"> 19 hours </option>
                                                    <option value="20 hours"> 20 hours </option>
                                                    <option value="21 hour"> 21 hours </option>
                                                    <option value="22 hours"> 22 hours </option>
                                                    <option value="23 hours"> 23 hours </option>
                                                    <option value="24 hours"> 24 hours </option>
                                                    
                                                </select></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="" name="education"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="" name="country"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state" name="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in </label><input type="text" class="form-control" placeholder="experience" value="" name="exp1"></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value="" name="exp2"></div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'></script>
                                </body>
                            </html>