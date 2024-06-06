<?php
session_start();

include 'db_connect.php';

$new_username = trim($_POST['username']);
$new_password1 = trim($_POST['password1']);
$new_password2 = trim($_POST['password2']);

// Validate passwords
if ($new_password1 !== $new_password2) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: register_new_user.php");
    exit;
}

if (strlen($new_password1) < 8) {
    $_SESSION['error'] = "Password must be at least 8 characters long.";
    header("Location: register_new_user.php");
    exit;
}

if (!preg_match('/[0-9]+/', $new_password1)) {
    $_SESSION['error'] = "The password must have at least one number.";
    header("Location: register_new_user.php");
    exit;
}

if (!preg_match('/[!@#$%^&*()]+/', $new_password1)) {
    $_SESSION['error'] = "The password must have at least one special character.";
    header("Location: register_new_user.php");
    exit;
}

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

// Check if username already exists
$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $new_username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "The username $new_username is already in use. Please choose another.";
    header("Location: register_new_user.php");
    exit;
}
$stmt->close();

// Insert new user
$stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $new_username, $hashed_password);

if ($stmt->execute()) {
    $_SESSION['success'] = "Registration successful.";
    header("Location: index.php");
    exit;
} else {
    $_SESSION['error'] = "Something went wrong. Not registered.";
    header("Location: register_new_user.php");
    exit;
}

$stmt->close();
$mysqli->close();
?>
