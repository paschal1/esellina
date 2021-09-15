<?php
require_once 'pdoconfig.php';
try{
   //database_connection charset=utf8mb4;
$dbconn = new PDO("mysql:host=$host;  dbname=$dbname", $username, $password);
 echo "";

}catch
(PDOException $pe)
{
die("could not connect:" . $pe->getMessage());
}


// $dbconn = mysqli_connect("localhost","epsphzof_starite","paschal@081","epsphzof_pawn");

// <<<<<<< HEAD
// //database_connection
// $dbconn = new PDO("mysql:host=localhost;  dbname=epsphzof_pawn; charset=utf8mb4;","epsphzof_starite","paschal@081");
// =======
// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// >>>>>>> 03fe6d4219ca75ff3706a52275aeb382b0a196ca

//   date_default_timezone_set("Africa/lagos"); 




?>