<?php
session_start();

include 'db_connect.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Prepare statement to prevent SQL injection
$stmt = $mysqli->prepare("SELECT idusers, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($userid, $uname, $pw);

if ($stmt->num_rows == 1) {
    $stmt->fetch();
    if (password_verify($password, $pw)) {
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        header("Location: index.php");
        exit;
    } else {
        session_destroy();
        echo "Password incorrect<br>";
    }
} else {
    session_destroy();
    echo "Username or password incorrect<br>";
}

$stmt->close();
// Ensure the connection is closed only once
if ($mysqli) {
    $mysqli->close();
}

echo "<a href='login_form.php'>Return to login page</a>";
?>
