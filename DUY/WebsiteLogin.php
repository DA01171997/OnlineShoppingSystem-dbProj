<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <style>
.jumbotron{
    background-color:powderblue;
    color:white;
}
a {
    color: hotpink;
}
</style>
</head>
<body style="background-color:powderblue;">

<div class="container">
 <div class="jumbotron">
  <h1 align="center">Online Shopping System</h1>
  <h2>Login</h2>
  <form method="post" action="/OnlineShoppingSystem/WebsiteLogin.php">
  <?php include('errors.php'); ?>
  <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd1">Password:</label>
      <input type="password" class="form-control" id="pwd1" placeholder="Enter Password" name="pswd1">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-light" name="login_user">Login</button>
  </form>
    Not a member? <a href ="/OnlineShoppingSystem/Register.php"> Sign Up</a>
  </div>
</div>

</body>
</html>
