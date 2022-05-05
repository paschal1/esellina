<?php

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
    date_default_timezone_get('Africa/Lagos');
    $date = date('m/d/Y h:i:s a', time());
    include('../esellina/pschat/database_connect.php');
    $statement = $dbconn ->prepare("INSERT INTO customer_payment (status, reference, name, date_purchased, email) VALUES (?,?,?,?,?)");
    $statement-> bind_param("sssss", $status, $reference, $name, $date, $email);
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
