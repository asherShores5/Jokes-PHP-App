<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jokes Page - All Jokes</title>
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
        <h1>All Jokes</h1>
        <div id="accordion">
            <?php
            include 'db_connect.php';

            $sql = "SELECT Jokes_table.Joke_questions, Jokes_table.Joke_answer, users.username FROM Jokes_table JOIN users ON users.idusers = Jokes_table.users_idusers";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $safe_joke_q = htmlspecialchars($row['Joke_questions']);
                    $safe_joke_a = htmlspecialchars($row['Joke_answer']);
                    $username = htmlspecialchars($row['username']);

                    echo "<h3>$safe_joke_q</h3>";
                    echo "<div><p>$safe_joke_a -- Submitted by $username</p></div>";
                }
            } else {
                echo "<p>No results found</p>";
            }

            $mysqli->close();
            ?>
        </div>
        <a href="index.php">Return to main page</a>
    </div>
</body>

</html>
