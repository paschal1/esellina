<?php
session_start();
  

	include('../DATABASE/dbconn.php');

    if (isset($_GET['total_price'])){




    $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
    $row=mysqli_fetch_array($query);
    $user_id = $row['user_id'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $user_email=$row['email'];
    $contact=$row['contact'];

    
           $total = $_GET['total_price'];
           $date = date("Y-m-d H:i:s");
           $tax=$total * 0.12;
           $track_num= $user_id.$user_id+1000;
           $kobo = 100;
           $gross_total = $total * $kobo + $tax; 


//echo $gross_total;

       
        

$curl = curl_init();


$email = $user_email;
$amount = $gross_total;  //the amount in kobo. This value is actually NGN 300

// url to go to after payment
$callback_url = 'esellina.com/payment/callback.php';  

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer pk_test_278dd459f559b57fcd4e0353434dbafac37431f2", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);

}