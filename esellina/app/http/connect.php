<?php
#server name
$sName = "localhost";
#username
$uName = "epspixhw_starite";
#password
$pass ="paschal@081";

#database connection 
$db_name = "epspixhw_esellina";
#creating db connection 
try {
    $dbconn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed :". $e->getMessage();
}