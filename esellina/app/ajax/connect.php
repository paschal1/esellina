<?php
#server name
$sName = "localhost";
#username
$uName = "eseltwgh_starite";
#password
$pass ="paschal@081";

#database connection 
$db_name = "eseltwgh_esellina";
#creating db connection 
try {
    $dbconn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed :". $e->getMessage();
}

// #server name
// $sName = "localhost";
// #username
// $uName = "root";
// #password
// $pass ="";

// #database connection 
// $db_name = "esellina";
// #creating db connection 
// try {
//     $dbconn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
//     $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(PDOException $e){
//     echo "Connection failed :". $e->getMessage();
// }