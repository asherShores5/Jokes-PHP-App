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

<style>
  * {
    font-family:Arial, Helvetica, sans-serrif;
  }
</style>

<?php
include "db_connect.php";

$sql = "SELECT * FROM InfoSec.Jokes_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<h3>" . $row['Joke_questions'] . "</h3>";
      
      echo "<div><p>" . $row["Joke_answer"] . " -- Submitted by user #" . $row['users_idusers'] . "</p></div>"; 

  }
} else {
  echo "0 results";
}
?>
