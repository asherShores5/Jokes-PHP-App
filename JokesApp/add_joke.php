<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (! $_SESSION['username']) {
    echo "Must log in first. Click <a href='login_form.php'here </a> to login<br>";
    exit;
}

include "db_connect.php";

$new_joke_q = addslashes($_GET['newjoke']);
$new_joke_a = addslashes($_GET['newanwser']);
$userid = $_SESSION['userid'];

$new_joke_q = addslashes($new_joke_q);
$new_joke_a = addslashes($new_joke_a);

echo "<h2>Trying to add a new joke</h2><br>";

$stmt = $mysqli->prepare("INSERT INTO InfoSec.Jokes_table (JokeID, Joke_questions, Joke_answer, users_idusers) VALUES (NULL, ?, ?, ?)");
$stmt->bind_param("ssi", $new_joke_q, $new_joke_a, $userid);

$stmt->execute();
$stmt->close();

echo "Joke: $new_joke_q<br>";
echo "Answer: $new_joke_a<br><br>";

include "search_all_jokes.php";

?>

<a href="index_joke.php">Return to main page</a>

