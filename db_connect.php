<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbhost = "127.0.0.1";
$dbuser = "jokes_user";
$dbpassword = "userpassword";
$dbdatabase = "InfoSec";
$dbport = "3306";

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
