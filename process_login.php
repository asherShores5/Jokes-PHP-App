<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";

$username = addslashes($_POST['username']);

$password = addslashes($_POST['password']);

echo "Username: " . $username . " Password: " . $password . "<br>";

//echo "<h2>Show all jokes with the word \"$keywordfromform\"  </h2>";

$stmt = $mysqli->prepare("SELECT idusers, username, password FROM users where username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

if ($stmt->num_rows == 1) {
    echo "<br>Username found<br>";
    $stmt->fetch();
    if (password_verify($password, $pw)) {
        echo "Password Match<br>";
        echo "Login success<br>";
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        echo "<br><a href='index_joke.php'>Return to main page</a>";
        exit;
    } else {
        $_SESSION = [];
        session_destroy();
        echo "Password incorrect<br>";
    }
} else {
    echo "0 results. Nobody with that username and password";
    $_SESSION = [];
    session_destroy();
}

echo "<br>SESSION = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<a href='index_joke.php'>Return to main page</a>";
?>

</div>


