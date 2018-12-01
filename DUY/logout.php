<?php 
session_start();
if (isset($_POST['logout_user'])){
    $_SESSION=array();
    $_POST = array();
    session_destroy();
}
if(isset($_SESSION['success'])) {
?>
<!DOCTYPE html>
<html lang="en">
<title>Logout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/OnlineShoppingSystem/style.css">
<head>
</head>
<body style="background-color:powderblue;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <a class="my-0 mr-md-auto font-weight-normal" href="/OnlineShoppingSystem/index.php">Online Shopping System<a>
      <a class="btn btn-outline-primary" href="/OnlineShoppingSystem/index.php">Back</a>
</div>
<div class="container">
 <div class="jumbotron">
  <form method="post" action="/OnlineShoppingSystem/logout.php">
   <h2 align="center"> Logout Duy A Do?</h2>
  <button type="submit" class="btn btn-outline-warning btn-lg btn-block" name="logout_user">Logout</button>
    <?php // &nbsp = spaces ?>
  </form>
  </div>
</div>

</body>
</html>
<?php 
}
else {
echo"<script>location.href='/OnlineShoppingSystem/WebsiteLogin.php'</script>";
}
?>