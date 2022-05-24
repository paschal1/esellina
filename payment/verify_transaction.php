<?php
session_start();
if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:../login.php');
        exit();
    }
$ref = $_GET['reference'];
if($ref == ""){
    header("location:javascript://history.go(-1)");
}
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/". rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_b8d583c64ecd6f9007d8b7ae9d172afcaf548c29",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
   // echo $response;
   $result = json_decode($response);
  }

  if($result->data->status == 'success'){
    $status = $result ->data-> status;
    $reference = $result ->data-> reference;
    $lname = $result-> data -> customer -> last_name;
    $fname = $result-> data -> customer -> first_name;
    $name = $lname .' '.$fname;
    $email = $result-> data -> customer -> email;
    $prod_id = $result-> data -> customer -> prod_id;
    $post_id = $result-> data -> customer -> post_id;
    date_default_timezone_get('Africa/Lagos');
    $date = date('m/d/Y h:i:s a', time());
    $id = $_SESSION['id'];
    include('../esellina/pschat/database_connect.php');
    $statement = $dbconn ->prepare("INSERT INTO customer_payment (status, reference, name, date_purchased, email, user_id, post_id, product_id) VALUES (?,?,?,?,?,?,?,?)");
    $statement-> bind_param("ssssssss", $status, $reference, $name, $date, $email, $id, $post_id, $prod_id);
    $statement ->execute();
    if (!$statement){
        echo "error".mysqli_error($dbconn);
    }else{
        header("location: success.php?status=success");
        exit;
    }
    $statement -> close();
    $dbconn->close();
}else{
      header("location: error.html");
      exit;
  }
?>
