<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sellina signup</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- boot strap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="page-header"  style="padding:15px;">
    <div class="w-400 p-5 shadow rounded">
        <form method="POST" action="app/http/sign_up.php" enctype="multipart/form-data">

            <div class="d-flex justify-content-center align-items-center flex-column">
                <h3 class="display-4 fs-1 text-center">SIGN UP</h3>
                <img src="img/EPS logo B&W copyPNG.png" alt="logo" class="w-25"> 
            </div>

                        


                            <div class="controls">
                                    <div class="col-md-12"><?php if(isset($_GET['error'])){?>
                                    <div class="alert alert-warning" role="alert"><?php echo htmlspecialchars($_GET['error']);?></div> <?php } ?>
                                   
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Firstname *</label>
                                            <input id="form_name" type="text" name="firstname" class="form-control"
                                                placeholder="Please enter your firstname *" 
                                                data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname *</label>
                                            <input id="form_lastname" type="text" name="lastname" class="form-control"
                                                placeholder="Please enter your lastname *" 
                                                data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Profile Picture *</label>
                                            <input id="form_name" type="file" name="pic" class="form-control"
                                                 
                                                data-error="image is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Address *</label>
                                            <input id="form_lastname" type="text" name="address" class="form-control"
                                                placeholder="Please enter your Address *" 
                                                data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="form_email" type="email" name="email" class="form-control"
                                                placeholder="Please enter your email *" 
                                                data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phone">Contact</label>
                                            <input id="form_phone" type="tel" name="contact" class="form-control"
                                                placeholder="Please enter your Contact Info">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Phone *</label>
                                            <input id="form_email" type="tel" name="phone" class="form-control"
                                                placeholder="Phone eg. +2348130062780 *" 
                                                data-error="Valid Phone number is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phone">Password</label>
                                            <input id="form_phone" type="password" name="password" class="form-control"
                                                placeholder="Please enter your password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <span style="color:gray;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">DOB *</label>
                                                <input id="form_email" type="date" name="birth_date"
                                                    class="form-control" placeholder="Please enter your DOB *"
                                                     data-error="Valid DOB is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6" bg="black">
                                            <div class="form-group">
                                                <label for="form_need">Gender *</label>
                                                <select id="form_need" name="gender" class="form-control"
                                                     data-error="Please specify your need.">

                                                    <option value="Select Gender:"> Select Gender: </option>
                                                    <option value="Female"> Female </option>
                                                    <option value="Male"> Male </option>
                                                    <option value="Custom"> Custom </option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_phone">Username</label>
                                            <input id="form_phone" type="text" name="username" class="form-control"
                                                placeholder="Please enter your Username">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </span>
                                <div class="col-md-12">
                                    <input type="submit" class="bbtn btn-secondary btn-round  btn-block"
                                        value="Create account" id="submit" name="submit">
                                    <span class="glyphicon glyphicon-floppy-save"></span>
                                </div>
                            </div>
                            <div class="row">
                               
                                    <p class="text-muted"><strong>*</strong> These fields are required.
                                    </p>
                                </div>
                            </div>
                    </div>

                    

        </form>
    </div>
</div>
</body>

</html>