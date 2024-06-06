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

echo "<h2>Trying to add a new joke</h2><br>";

if ($stmt = $mysqli->prepare("INSERT INTO Jokes_table (Joke_questions, Joke_answer, users_idusers) VALUES (?, ?, ?)")) {
    $stmt->bind_param("ssi", $new_joke_q, $new_joke_a, $userid);
    $stmt->execute();
    $stmt->close();
    echo "Joke: $new_joke_q<br>";
    echo "Answer: $new_joke_a<br><br>";
} else {
    echo "Error: " . $mysqli->error;
}

include 'search_all_jokes.php';

$mysqli->close();
?>

<a href="index.php">Return to main page</a>
