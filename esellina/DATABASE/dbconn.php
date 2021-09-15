<?php
// $dbconn = mysqli_connect("localhost","epsphzof_starite","paschal@081","epsphzof_pawn");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }

//   date_default_timezone_set("Africa/lagos"); 


$dbconn = mysqli_connect("localhost","root","","esellina");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  date_default_timezone_set("Africa/lagos"); 

?>