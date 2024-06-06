<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbhost = "172.17.0.2";
$dbuser = "jokes_user";
$dbpassword = "userpassword";
$dbdatabase = "InfoSec";
$dbport = "3306";

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully to the database.";
}
?>
