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
<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/OnlineShoppingSystem/style.css">
  <style>
</style>
</head>
<body style="background-color:powderblue;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal" href="/OnlineShoppingSystem/index.php">Online Shopping System<a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 " href="#">Features</a> 
        <a class="p-2 " href="#">Enterprise</a> 
        <a class="p-2 " href="#">Support</a> 
        <?php
         echo "<a class='p-2' href='/OnlineShoppingSystem/updateuser.php'>$name</a>";
        ?>
      </nav>
      <form method ="post" class ="form-control" id="search" action="/OnlineShoppingSystem/index.php"style ="
            width: 275px;
            height: 40px;
            padding: 0px;
            border: 0px;
            background: white;
            border-radius: 5px;">
            <input class="form-group" type="text" placeholder="search" name="search" formmethod="post" >
            <?php //<a class="btn btn-outline-primary mt-md-0 " href="/OnlineShoppingSystem/logout.php" name="logout">Logout</a> ?>
            <button class="btn btn-outline-success" form="search" type="submit" formaction="/OnlineShoppingSystem/index.php">Search</button>     
     </form>
        
     <form method ="post" class ="form-control" id="logout" action="/OnlineShoppingSystem/index.php"style ="
            width: 75px;
            height: 40px;
            padding: 0px;
            border: 0px;
            background: white;
            border-radius: 5px;">
            <input class="btn btn-outline-primary mt-md-0 "  form="logout" type="submit" value="logout" id ="form2" name = "logout">
       </form>
       
    </div>
<div class="container">
 <div class="jumbotron">
 <?php 
 echo "<h1 align='center'>Welcome $name</h1>"; 
 ?>
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