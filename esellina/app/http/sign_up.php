<?php
// check if user details submitted
if(isset($_POST['submit'])){
#database connect 
include 'connect.php';
    // get data from POST request and store them in var

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];

    // checking URL data format

    $data = 'firstname='.$firstname.'lastname='.$lastname.'address='.$address.'email='.$email.'phone='.$phone.'birth_date='.$birth_date.'gender='.$gender.'username='.$username;
if(empty($firstname)){
    # error message 
    $em = "First name required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em");
    exit;
    }else if(empty($lastname)){
        # error message 
    $em = "Last name required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($address)){
# error message 
    $em = "Address is required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($email)){
# error message 
    $em = "Email is required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($contact)){
# error message 
    $em = "Contact Address is required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($phone)){
# error message 
    $em = "Phone Number required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($password)){
# error message 
    $em = "Password  required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($birth_date)){
# error message 
    $em = "Dirth of Birth required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($gender)){
# error message 
    $em = "Gender required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else if(empty($username)){
# error message 
    $em = "Username required";
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php?error=$em&$data");
    exit;
    }else{
// checking if the username is taken
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute([$username]);

        if($stmt->rowCount()>0){
            $em = "The Username ($username) is taken";
            header("location: ../../sign_up.php?error=$em&$data");
            exit;
        }else{
            #profile picture uploading
            if(isset($_FILES['pic'])){
                #get data and store them in var
                $img_name = $_FILES['pic']['name'];                
                $tmp_name = $_FILES['pic']['tmp_name']; 
                $error = $_FILES['pic']['error'];   
                
                #error in uploading
                if($error === 0){
                    #get image extention store in var
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    //CREATING ARRAY TO  UPLOAD IMAGE EXTENTION.
                    $img_ex_lc = strtolower($img_ex);
                    //CREATING ARRAY TO STORE ALLOWED TO UPLOAD IMAGE EXTENTION.
                    $allowed_exs = array("jpg","jpeg","png");


                    #check if the img extention is present in array
                    if(in_array($img_ex_lc, $allowed_exs)){
                        #renaim image
                        $new_image_name = $username.'.'.$img_ex_lc;
                        #creating upload path on root directory
                        $img_upload_path = '../../uploads/'.$new_image_name;
                        # move uploaded image 
                        move_uploaded_file($tmp_name, $img_upload_path);

                    }else{
                        $em = "Your file cannot be uploaded";
                        header("location: ../../sign_up.php?error=$em&$data");
                        exit; 
                    }

                }else{
                    $em = "unknown error occurred";
                    header("location: ../../sign_up.php?error=$em&$data");
                    exit;
                }

            }
            // password hash 
            $password = password_hash($password, PASSWORD_DEFAULT);
            # if the user upload profile picture
            if(isset($new_image_name)){
                # insert into db
                $sql = "INSERT INTO users(firstname,lastname,address,email,contact,phone,password,birth_date,gender,username,pic)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $dbconn->prepare($sql);
                $stmt->execute([$firstname,$lastname,$address,$email,$contact,$phone,$password,$birth_date,$gender,$username,$new_image_name]);
            }else{
                # insert into db
                $sql2 = "INSERT INTO users (firstname,lastname,address,email,contact,phone,password,birth_date,gender,username)VALUES(?,?,?,?,?,?,?,?,?,?)";
                $stmt = $dbconn->prepare($sql2);
                $stmt->execute([$firstname,$lastname,$address,$email,$contact,$phone,$password,$birth_date,$gender,$username]);
            }
            # success message
            $sm = "Account Created Successfully"; 
            # redirect to 'login.php' and passing success message
            header("location: ../../login.php?success=$sm");
            exit;
        }
    }
       
}else{
    # redirect to 'signup.php' and passing error message
    header("location: ../../sign_up.php");
    exit;
}
?>