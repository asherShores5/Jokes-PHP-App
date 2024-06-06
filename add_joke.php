<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Must log in first. Click <a href='login_form.php'>here</a> to login<br>";
    exit;
}

include 'db_connect.php';

// Get the joke details from the form submission
$new_joke_q = trim($_POST['newjoke']);
$new_joke_a = trim($_POST['newanwser']);
$userid = $_SESSION['userid'];

// Check if inputs are not empty
if (empty($new_joke_q) || empty($new_joke_a)) {
    echo "Joke question and answer cannot be empty.<br>";
    echo "<a href='index.php'>Return to main page</a>";
    exit;
}

if ($stmt = $mysqli->prepare("INSERT INTO Jokes_table (Joke_questions, Joke_answer, users_idusers) VALUES (?, ?, ?)")) {
    $stmt->bind_param("ssi", $new_joke_q, $new_joke_a, $userid);
    if ($stmt->execute()) {
        echo "<h2>Joke added successfully!</h2><br>";
        echo "Joke: " . htmlspecialchars($new_joke_q) . "<br>";
        echo "Answer: " . htmlspecialchars($new_joke_a) . "<br><br>";
    } else {
        echo "<h2>Error adding joke</h2><br>";
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
} else {
    echo "<h2>Database error</h2><br>";
    echo "Error: " . $mysqli->error . "<br>";
}

// Ensure the connection is closed only once
if ($mysqli) {
    $mysqli->close();
}

echo "<a href='index.php'>Return to main page</a>";
?>
