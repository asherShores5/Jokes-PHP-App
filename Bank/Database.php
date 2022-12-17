<?php

//echo "Database Accesed <br>";

$dbhost="";
$dbuser ="root";
$dbpassword ="root";
$dbdatabase = "BANKINGDEMO";
$dbport = "3306";

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

?>
