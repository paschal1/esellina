<?php
// $dbconn = mysqli_connect("localhost","root","","folder");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }

//   date_default_timezone_set("Africa/lagos"); 


$dbconn = mysqli_connect("localhost","epspixhw_starite","paschal@081","epspixhw_esellina");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  date_default_timezone_set("Africa/lagos"); 

?>
