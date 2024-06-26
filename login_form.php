<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Jokes Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon_io/favicon.ico">
</head>

<body>
    <div class="container">
        <h1>Login for Jokes Page</h1>

        <?php include 'db_connect.php'; ?>

        <form class="form-horizontal" action="process_login.php" method="post">
            <fieldset>
                <legend>Please Login</legend>

                <!-- Username input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Username</label>
                    <div class="col-md-5">
                        <input id="username" name="username" type="text" placeholder="Your name" class="form-control input-md" required>
                        <p class="help-block">Please enter a username</p>
                    </div>
                </div>

                <!-- Password input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password</label>
                    <div class="col-md-5">
                        <input id="password" name="password" type="password" placeholder="Your password" class="form-control input-md" required>
                        <p class="help-block">Please enter a password</p>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>

        <a href="index.php">Return to main page</a>

        <?php 
        // Ensure the connection is closed only once
        if ($mysqli) {
          $mysqli->close();
        }
        ?>
    </div>
</body>

</html>
