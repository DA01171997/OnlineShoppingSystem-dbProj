<?php include('server.php'); 
if(!isset($_SESSION['success'])){
?>
<!DOCTYPE html>
<html lang="en">
<title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/OnlineShoppingSystem/style.css">
<head>
</head>
<body style="background-color:powderblue;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
<a class="my-0 mr-md-auto font-weight-normal" href="/OnlineShoppingSystem/index.php">Online Shopping System<a>
      <a class="btn btn-outline-primary " href="/OnlineShoppingSystem/Register.php">Sign Up</a>
</div>
<div class="container">
 <div class="jumbotron">
  <form method="post" action="/OnlineShoppingSystem/WebsiteLogin.php" style="width: 70%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: #f5f5f5;
    border-radius: 0px 0px 10px 10px;">
   <h2>Login</h2>
  <?php include('errors.php'); ?>
  <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd1">Password:</label>
      <input type="password" class="form-control" id="pwd1" placeholder="Enter Password" name="pswd1">
    </div>
    <div class="form-group">
    </div>
    <button type="submit" class="btn btn-outline-primary " name="login_user">Login</button>
    <?php // &nbsp = spaces ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    Not a member? <a href ="/OnlineShoppingSystem/Register.php"> Sign Up</a>
  </form>
  </div>
</div>

</body>
</html>
<?php
}
else {
  echo"<script>location.href='/OnlineShoppingSystem/index.php'</script>";
  }
?>