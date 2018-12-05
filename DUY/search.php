<?php include('server.php');
if (isset($_POST['logout_user'])){
    $_SESSION=array();
    $_POST = array();
    session_destroy();
}
$name="User";
$cno="cno";
$arrayIndex=array();
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
  <link rel="stylesheet" type="text/css" href="/OnlineShoppingSystem/style.css">
  <style>
</style>
</head>
<body style="background-color:powderblue;">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal" href="/OnlineShoppingSystem/index.php">Online Shopping System<a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 " href="/OnlineShoppingSystem/index.php">Features</a> 
        <a class="p-2 " href="/OnlineShoppingSystem/checkorder.php">Check Order Status</a> 
        <a class="p-2 " href="/OnlineShoppingSystem/viewcart.php">Check Out</a> 
        <a class="p-2 " href="/OnlineShoppingSystem/viewcart.php">View/Edit Cart</a> 
        <?php
         echo "<a class='p-2' href='/OnlineShoppingSystem/updateuser.php'>$name</a>";
        ?>
      </nav>
      <form method ="post" class ="form-control" id="search" action="/OnlineShoppingSystem/search.php"style ="
            width: 275px;
            height: 40px;
            padding: 0px;
            border: 0px;
            background: white;
            border-radius: 5px;">
            <input class="form-group" type="text" placeholder="search" name="search" formmethod="post" >
            <?php //<a class="btn btn-outline-primary mt-md-0 " href="/OnlineShoppingSystem/logout.php" name="logout">Logout</a> ?>
            <button class="btn btn-outline-success" form="search" type="submit" formaction="/OnlineShoppingSystem/search.php">Search</button>     
     </form>
        
     <form method ="post" class ="form-control" id="logout" action="/OnlineShoppingSystem/search.php"style ="
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
if(isset($_SESSION['search'])){
$searchpname = strtolower($_SESSION['search']);
$dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$parts_query= "SELECT pno, pname, qoh, price, olevel FROM parts where lower(pname) like '%$searchpname%'"; 
$result=mysqli_query($dbconnection, $parts_query);
if (!$result) {
    die("Database query failed.");
 }
$num=mysqli_num_rows($result);  
mysqli_close($dbconnection);  
?>

<div class="container">
 <div class="jumbotron" background= "#f5f5f5">
 <?php 
 echo "<h1 align='center'>Welcome $name
 <p>Here are our movies</p></h1>"; 
 ?>

<?php echo "<form method ='post' id='cart' action='/OnlineShoppingSystem/search.php' style=' width: 90%; border: 1px solid #B0C4DE; border-radius: 0px 0px 10px 10px; background: #f5f5f5; margin: 0px auto; padding: 20px;'>";?>
 <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">Movie#</th>
      <th scope="col">Movie Name</th>
      <th scope="col">$Price</th>
      <th scope="col">AQTY</th>
      <th scope="col">QTY</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=0;
    
    while ($i < $num) {
    $assoarray = mysqli_fetch_assoc($result);
    $movieNum = $assoarray["pno"];
    $movieName = $assoarray["pname"];
    $moviePrice = $assoarray["price"];
    $movieAvailQty = $assoarray["qoh"];
    $movieWantQty   = $assoarray["olevel"];
    $arrayIndex[$i] = $movieNum;
    $inputarray[$movieNum]=0;
    ?>
    <?php echo "<tr>"; ?>
    
    <?php echo  "<th scope='row'>$movieNum</th>"; ?>
     <?php echo  "<td>$movieName</td>"; ?>
     <?php echo  "<td>$moviePrice</td>"; ?>
     <?php echo  "<td>$movieAvailQty</td>"; ?>
     <?php echo "<td>"; ?>

     <?php echo "<div class='form-group' style='width:40%;'>"; ?>    
     <?php echo "<input type='number' class='form-control'  form='cart' placeholder='0' name='inputarray[$movieNum]'>"; ?>
     
     <?php echo "</div>"; ?>

     <?php echo "</td>"; ?>  
     <?php echo "</tr> "; ?>
     <?php
    $i++;    
    }
    ?>
  </tbody>
</table>
<?php echo "<button type='submit' form='cart' name='cart' class='btn btn-xs btn-outline-primary '>AddCart</button>";?>
<?php echo "</form>"; ?>
  </div>
</div>
</body>
</html>
<?php
}
$inputarray = array();
if(isset($_POST['inputarray'])){
    $inputarray = $_POST['inputarray'];    
    $_SESSION['movieQty'] = $_POST['inputarray'];
    $_SESSION['movieIndex'] = $arrayIndex;
    $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    for($counter = 0; $counter < sizeof($arrayIndex); $counter++)
	{
        $index = $arrayIndex[$counter];
        $qty= $inputarray[$arrayIndex[$counter]];
        $parts_query= "SELECT qoh from parts where pno=$index"; 
        $result=mysqli_query($dbconnection, $parts_query);
        $movieAvailQty = $assoarray["qoh"];
        if (($movieAvailQty - $qty) <0){
            array_push($errors, "Not Enough Available QTY for movie# $index");
        }
        if($qty<0){
            array_push($errors, "Cannot have negative QtY for movie# $index");
        }
        if (count($errors)==0 && $qty>0){
            $parts_query= "INSERT INTO cart (cno, pno, qty) VALUES ('$cno','$index','$qty')"; 
            $result=mysqli_query($dbconnection, $parts_query);
        }
    }
    mysqli_close($dbconnection);
    //var_dump($_SESSION['movieQty']);
}
}
else {
echo"<script>location.href='/OnlineShoppingSystem/WebsiteLogin.php'</script>";
}
?>