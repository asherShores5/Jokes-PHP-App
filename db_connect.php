<?php

$dbhost = "172.17.0.2";
$dbuser = "jokes_user";
$dbpassword = "password";
$dbdatabase = "InfoSec";
$dbport = "3306";

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
