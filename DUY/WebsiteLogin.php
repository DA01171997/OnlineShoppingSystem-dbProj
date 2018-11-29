<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
  <form action="/Register.php">
    <div class="form-group">
      <label for="Customer Number">Customer Number:</label>
      <input type="number" class="form-control" id="number" placeholder="Customer Number" name="cnumber">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-light">Login</button>
  </form>
    Not a member? <a href ="login"> Sign Up</a>
  </div>
</div>

</body>
</html>
