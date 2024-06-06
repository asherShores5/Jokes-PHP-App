<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokes Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon_io/favicon.ico">
    <style>
        .nav-buttons {
            margin-bottom: 20px;
        }
        .nav-buttons a {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Jokes Page</h1>

        <div class="nav-buttons">
            <?php
            session_start();

            if (isset($_SESSION['username'])) {
                echo '<a href="logout.php" class="btn btn-sm btn-primary">Log out</a>';
                echo "<p>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</p>";
            } else {
                echo '<a href="login_form.php" class="btn btn-sm btn-primary">Login</a>';
                echo '<a href="register_new_user.php" class="btn btn-sm btn-primary">Register</a>';
            }
            ?>
        </div>

        <br><br>

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include 'db_connect.php';
        ?>

        <form class="form-horizontal" action="search_keyword.php" method="get">
            <fieldset>
                <!-- Search input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="keyword">Search input</label>
                    <div class="col-md-5">
                        <input id="keyword" name="keyword" type="text" placeholder="e.g. chicken" class="form-control input-md">
                        <p class="help-block">Please enter a keyword</p>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </fieldset>
        </form>

        <?php if (isset($_SESSION['username'])): ?>
        <form class="form-horizontal" action="add_joke.php" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Add a joke</legend>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="newjoke">Enter the text of your new joke</label>
                    <div class="col-md-6">
                        <input id="newjoke" name="newjoke" type="text" class="form-control input-md" required>
                        <span class="help-block">Enter the text of your new joke here</span>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="newanser">The answer to your joke</label>
                    <div class="col-md-5">
                        <input id="newanser" name="newanwser" type="text" class="form-control input-md" required>
                        <span class="help-block">Enter the punchline here</span>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Add a new joke</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php else: ?>
        <p>Please <a href="login_form.php">login</a> to add a joke.</p>
        <?php endif; ?>

        <?php
        // Ensure the connection is closed only once
        if ($mysqli) {
            $mysqli->close();
        }
        ?>
    </div>
</body>

</html>
