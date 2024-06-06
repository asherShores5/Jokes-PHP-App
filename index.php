<html>
    
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<h1>Jokes Page</h1>
<a href="logout.php">Click here to log out<a>
<a href="login_form.php">Click here to login<a>
<a href="register_new_user.php">Click here to register<a>
<br><br>

<?php

include "db_connect.php";

?>


<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Search input-->
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


<form class="form-horizontal" action="add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Add a joke</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Enter the text of your new joke</label>
  <div class="col-md-6">
  <input id="newjoke" name="newjoke" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the text of your new joke here</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanser">The answer to your joke</label>
  <div class="col-md-5">
  <input id="newanser" name="newanwser" type="text" placeholder="" class="form-control input-md">
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



<?php
//include "search_keyword.php";

$mysqli->close();


?>

</body>


</html>

