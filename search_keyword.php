<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head>

<?php

include "db_connect.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$keywordfromform = addslashes($_GET['keyword']);

// Prevent XSS
//$keywordfromform = htmlspecialchars($keywordfromform);

echo "<h2>Show all jokes with the word \"$keywordfromform\"  </h2>";

$keywordfromform = "%" . $keywordfromform . "%";

$stmt = $mysqli->prepare("SELECT JokeID, Joke_questions, Joke_answer, users_idusers, username FROM Jokes_table JOIN users ON users.idusers = Jokes_table.users_idusers WHERE Joke_questions LIKE ?");

$stmt->bind_param("s", $keywordfromform);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($JokeID, $Joke_questions, $Joke_answer, $user_idusers, $username);

// $sql = "SELECT JokeID, Joke_questions, Joke_answer, users_idusers, username FROM InfoSec.Jokes_table JOIN users ON users.idusers = Jokes_table.users_idusers WHERE Joke_questions LIKE '%" .  $keywordfromform ."%'";

//echo "SQL Statement = " . $stmt . "<br>";
    
if ($stmt->num_rows > 0) {

  echo "<div id='accordion'>";
  while ($stmt->fetch()) {

    //prevent XSS
    $safe_joke_q = htmlspecialchars($Joke_questions);
    $safe_joke_a = htmlspecialchars($Joke_answer);

    echo "<h3>" . $safe_joke_q . "</h3>";
      
    echo "<div><p>" . $safe_joke_a . " -- Submitted by user: " . $username . "</p></div>"; 
  }
  echo "</div>";
} else {
  echo "0 results";
}
  echo "<a href='index.php'>Return to main page</a>";

?>



