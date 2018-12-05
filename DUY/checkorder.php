<?php include('server.php');
if (isset($_POST['logout_user'])){
    $_SESSION=array();
    $_POST = array();
    session_destroy();
}
$name="User";
$cno="cno";
$modifyarrayIndex=array();
if(isset($_SESSION['success'])) {
    if(isset($_SESSION['cname'])){
        $name=$_SESSION['cname'];
    }
    if(isset($_SESSION['cno'])){
        $cno=$_SESSION['cno'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
</style>
</head>
<body style="background-color:powderblue;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal" href="index.php">Online Shopping System<a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 " href="index.php">Features</a> 
        <a class="p-2 " href="checkorder.php">Check Order Status</a> 
        <a class="p-2 " href="viewcart.php">Check Out</a> 
        <a class="p-2 " href="viewcart.php">View/Edit Cart</a> 
        <?php
         echo "<a class='p-2' href='updateuser.php'>$name</a>";
        ?>
      </nav>
      <form method ="post" class ="form-control" id="search" action="search.php"style ="
            width: 275px;
            height: 40px;
            padding: 0px;
            border: 0px;
            background: white;
            border-radius: 5px;">
            <input class="form-group" type="text" placeholder="search" name="search" formmethod="post" >
            <?php //<a class="btn btn-outline-primary mt-md-0 " href="logout.php" name="logout">Logout</a> ?>
            <button class="btn btn-outline-success" form="search" type="submit" formaction="search.php">Search</button>     
     </form>
        
     <form method ="post" class ="form-control" id="logout" action="search.php"style ="
            width: 75px;
            height: 40px;
            padding: 0px;
            border: 0px;
            background: white;
            border-radius: 5px;">
            <input class="btn btn-outline-primary mt-md-0 "  form="logout" type="submit" value="logout" id ="form2" name = "logout">
       </form>
       
    </div>

<?php

$dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$parts_query= "SELECT DISTINCT o.ono, o.received, o.recievedtime, o.shipped FROM orders as o, odetails as od WHERE o.ono = od.ono AND o.cno='$cno'";
$result=mysqli_query($dbconnection, $parts_query);
$num = 0;
if($dbconnection->query($parts_query))
{
    $num=$result->num_rows;  
}
else
{
    //echo "NO RESULT FOUND";
}
 
?>
<div class="container">
<?php 
 echo "<h1 align='center'>Welcome $name
 <p>Here Orders</p></h1>";
 ?> 
 <div class="jumbotron" style="
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: #f5f5f5;
    border-radius: 0px 0px 10px 10px;">

 
 <table class="table table-bordered">
 <thead>
   <tr>
     <th scope="col">Order#</th>
     <th scope="col">ReceivedDate</th>
     <th scope="col">ReceivedDate</th>
     <th scope="col">ShippedDate</th>
   </tr>
 </thead>
 <tbody>
 <?php
    $i=0;
    while ($i < $num) {
    $assoarray = mysqli_fetch_assoc($result);
    $ono = $assoarray["ono"];
    $recvDate = $assoarray["received"];
    $recvTime = $assoarray["recievedtime"];
    if (empty($assoarray["shipped"])){
        $shipDate = "Unknown";
    }
    else {
        $shipDate = $assoarray["shipped"];
    }
    ?>
    
    <?php echo "<tr>"; ?>   

    <td>
    <?php echo "<a class='text' href='checkorderStatus.php/?ono=$ono'>$ono<a>"; ?>   
    </td>
     <?php echo  "<td>$recvDate</td>"; ?>
     <?php echo  "<td>$recvTime</td>"; ?>
     <?php echo  "<td>$shipDate</td>";?>
    <?php echo "</tr> ";?>
    <?php
    $i++;    
    }
    ?>
 </tbody>
 </table>
  </div>
</div>
</body>
</html>
<?php

}
else {
echo"<script>location.href='WebsiteLogin.php'</script>";
}
?>