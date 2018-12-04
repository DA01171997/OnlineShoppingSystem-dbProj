<?php include('server.php');
if (isset($_POST['logout_user'])){
    $_SESSION=array();
    $_POST = array();
    session_destroy();
    
}
$name="User";
if(isset($_SESSION['success'])) {
    if(isset($_SESSION['cname'])){
      $name=$_SESSION['cname'];
  }
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
  <form method="post" action="/OnlineShoppingSystem/logout.php"style="width: 70%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: #f5f5f5;
    border-radius: 0px 0px 10px 10px;">
   <?php echo "<h2 align='center'> Logout $name?</h2>"; ?>
  <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="logout_checkout" href="/OnlineShoppingSystem/viewcart.php">CheckOut</button>
  <button type="submit" class="btn btn-outline-warning btn-lg btn-block" name="logout_user">Save Cart And Logout</button>
  <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="logout_empty">Empty Cart And Logout</button>
    <?php // &nbsp = spaces ?>
  </form>
  </div>
</div>

</body>
</html>
<?php
if (isset($_POST['logout_empty'])){
  $cno="";
  if(isset($_SESSION['cno'])){
    $cno=$_SESSION['cno'];
  }
  $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
  $parts_query= "DELETE FROM cart WHERE cno='$cno'";
  mysqli_query($dbconnection, $parts_query);
  mysqli_close($dbconnection);
  $_SESSION=array();
  $_POST = array();
  session_destroy();
  echo"<script>location.href='/OnlineShoppingSystem/WebsiteLogin.php'</script>";
} 
}
else {
echo"<script>location.href='/OnlineShoppingSystem/WebsiteLogin.php'</script>";
}
?>