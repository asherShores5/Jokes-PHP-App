<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon_io/favicon.ico">
    <style>
        .password-requirements {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
        }
        .password-requirements span {
            display: block;
        }
        .strength {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Please Register</h1>

        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form class="form-horizontal" action="process_new_user.php" method="post" id="registrationForm">
            <fieldset>
                <legend>Create New User</legend>

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
                    <label class="col-md-4 control-label" for="password1">Password</label>
                    <div class="col-md-5">
                        <input id="password1" name="password1" type="password" placeholder="Your password" class="form-control input-md" required>
                        <p class="help-block">Please enter a password</p>
                        <div class="password-requirements">
                            <span>Password must be at least 8 characters long</span>
                            <span>Password must contain at least one number</span>
                            <span>Password must contain at least one special character (!@#$%^&*())</span>
                            <div class="strength" id="strength"></div>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password2">Confirm Password</label>
                    <div class="col-md-5">
                        <input id="password2" name="password2" type="password" placeholder="Please confirm password" class="form-control input-md" required>
                        <p class="help-block">Please confirm your password</p>
                        <div id="passwordMismatch" style="color:red; display:none;">Passwords do not match</div>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary" disabled>Create new user</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <a href="index.php">Return to main page</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#password1, #password2').on('keyup', function() {
                var password1 = $('#password1').val();
                var password2 = $('#password2').val();

                // Check password requirements
                var lengthCheck = password1.length >= 8;
                var numberCheck = /[0-9]/.test(password1);
                var specialCharCheck = /[!@#$%^&*()]/.test(password1);

                if (lengthCheck && numberCheck && specialCharCheck) {
                    $('#strength').text('Strong').css('color', 'green');
                } else {
                    $('#strength').text('Weak').css('color', 'red');
                }

                // Check if passwords match
                if (password1 === password2) {
                    $('#passwordMismatch').hide();
                    if (lengthCheck && numberCheck && specialCharCheck) {
                        $('#submit').prop('disabled', false);
                    } else {
                        $('#submit').prop('disabled', true);
                    }
                } else {
                    $('#passwordMismatch').show();
                    $('#submit').prop('disabled', true);
                }
            });
        });
    </script>
</body>

</html>
