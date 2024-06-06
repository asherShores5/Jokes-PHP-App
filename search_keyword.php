<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Jokes</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <script>
        $(function() {
            $("#accordion").accordion();
        });
    </script>
</head>

<body>
    <div class="container">
        <?php
        include 'db_connect.php';

        $keywordfromform = htmlspecialchars(trim($_GET['keyword']));
        $keywordfromform = "%" . $keywordfromform . "%";

        echo "<h2>Show all jokes with the word \"" . htmlspecialchars($_GET['keyword']) . "\"</h2>";

        $stmt = $mysqli->prepare("SELECT Joke_questions, Joke_answer, users.username FROM Jokes_table JOIN users ON users.idusers = Jokes_table.users_idusers WHERE Joke_questions LIKE ?");
        $stmt->bind_param("s", $keywordfromform);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($Joke_questions, $Joke_answer, $username);

        if ($stmt->num_rows > 0) {
            echo "<div id='accordion'>";
            while ($stmt->fetch()) {
                $safe_joke_q = htmlspecialchars($Joke_questions);
                $safe_joke_a = htmlspecialchars($Joke_answer);
                $safe_username = htmlspecialchars($username);

                echo "<h3>$safe_joke_q</h3>";
                echo "<div><p>$safe_joke_a -- Submitted by $safe_username</p></div>";
            }
            echo "</div>";
        } else {
            echo "<p>No results found</p>";
        }

        $stmt->close();
        $mysqli->close();
        ?>
        <a href="index.php">Return to main page</a>
    </div>
</body>

</html>
