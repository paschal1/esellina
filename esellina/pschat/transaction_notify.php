<?php
session_start();
//connect.php;
$dbconn = mysqli_connect("localhost","eseltwgh_starite","paschal@081","eseltwgh_esellina");
//if(isset($_GET['1'])){
//  $post_id = 1;
 
 require_once('../geoplugin.class/geoplugin.class.php');

$geoplugin = new geoPlugin();

//locate the IP
$geoplugin->locate();

include('http://www.geoplugin.net/php.gp?ip='.$ip);

//$dbconn = mysqli_connect("localhost","root","","esellina");
$id = $_SESSION['id'];
$query = "SELECT cmt.id AS id, ux.post_txt, ux.post_pic, ux.price, cmt.status, cmt.reference, cmt.name AS name, cmt.date_purchased AS date_purchased FROM customer_payment AS cmt INNER JOIN user_post AS ux ON cmt.post_id = ux.post_id WhERE cmt.user_id = $id";
$result = mysqli_query($dbconn, $query);
$output = '';
if($result){
 while($row = mysqli_fetch_array($result))
 {
     
    $query = "SELECT * FROM users WHERE user_id=$id";
    $results = mysqli_query($dbconn, $query);

    while($rows = mysqli_fetch_array($results))
 {
   
    
     $output .= '
   <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../uploads/'.$rows["pic"].'" alt="..." height="60">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        
                                         <div class="small text-gray-500">Transactions @  '.$row["date_purchased"].'</div>
                                         
                                          ';
                                           $output .='<div class="text-truncate">Amount:'; if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	                                                    //our visitor is not using the same currency as the base currency
	                                                   $output .= " " . $geoplugin->convert($row["price"]) ." ";
                                                            }
                                                            $output .='</div>';
                                         
                                         $output.='  <div class="small text-gray-500">From '.$row["name"].' To Esellina.com</div>
                                             <div class="small text-gray-500">Status: '.$row["status"].'</div>
                                    </div></br>
                                    <div>
                                    <img class="img-thumbil" src="../uploads/'.$row["post_pic"].'" alt="..." height="160">
                                      <div class="small text-gray-500">'.$row["post_txt"].'</div> 
                                    </div>
                                </a>
   
   </a> 
   </li>
                               
                            </div>';
                           
 }
 }

 echo $output;
 }else
 {
     echo 'something went wrong';
 }

//}