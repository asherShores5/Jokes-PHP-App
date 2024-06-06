<?php

include "db_connect.php";

$new_username = $_POST['username'];
$new_password1 = $_POST['password1'];
$new_password2 = $_POST['password2'];

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);


//debug
echo "<h2>Trying to add a new user</h2> user: " . $new_username . " pw: " . $new_password1 . " pw2: " . $new_password2;


//Using REGEX for GOOOD passwords
if ($new_password1 != $new_password2) {
    echo "<br>Passwords do not match.<br>";
    echo "<a href='index.php'><br>Return to home page<br><a>";
    exit;
}

preg_match('/[0-9]+/', $new_password1, $matches);
if (sizeof($matches) == 0) {
    echo "<br>The password must have at least one number<br>";
    exit;
}

preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
if (sizeof($matches) == 0) {
    echo "<br>The password must have at least one special character<br>";
    exit;
}

if (strlen($new_password1) <= 8) {
    echo "<br>Password must be 8 characters<br>";
    exit;
}


//check if user is already there
$sql = "SELECT * FROM users where username = '$new_username'";

$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if ($result->num_rows > 0) {
    echo "<br>The username " . $new_username . " is already in the database. Cannot register.<br>";
    echo "<a href='index.php'><br>Return to home page<br><a>";
    exit;
}

//$sql = "INSERT INTO InfoSec.users (idusers, username, password) VALUES (null, '$new_username', '$new_password1')";

$stmt = $mysqli->prepare("INSERT INTO InfoSec.users (idusers, username, password) VALUES (null, ?, ?)");

$stmt->bind_param("ss", $new_username, $hashed_password);
$result = $stmt->execute();

//$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if ($result) {
    echo "<br>Registration success";
}
else {
    echo "Something went wrong. Not Registered";
}
echo "<a href='index.php'><br>Return to home page<br><a>";


?>
