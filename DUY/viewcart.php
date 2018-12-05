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
if(isset($_SESSION['cart'])||isset($_SESSION['success'])){
$dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$parts_query= "SELECT c.cartno, c.cno, c.pno, c.qty , p.pname, p.price, p.qoh FROM parts as p, cart as c WHERE cno='$cno' and c.pno = p.pno";
$result=mysqli_query($dbconnection, $parts_query);
if (!$result) {
    die("Database query failed.");
 }
$num=mysqli_num_rows($result);   
?>

<div class="container">
 <div class="jumbotron" background= "#f5f5f5">
 <?php 
 echo "<h1 align='center'>Welcome $name
 <p>Here Are Movies In Your Cart</p></h1>"; 
 ?>

<?php echo "<form method ='post' id='modifycart' action='/OnlineShoppingSystem/viewcart.php' style=' width: 100%; border: 1px solid #B0C4DE; border-radius: 0px 0px 10px 10px; background: #f5f5f5; margin: 0px auto; padding: 20px;'>";?>
<?php include('errors.php'); ?>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Cart# </th>
      <th scope="col">Movie# </th>
      <th scope="col">Movie Name </th>
      <th scope="col">$Price</th>
      <th scope="col">A.QTY</th>
      <th scope="col">QTY</th>
      <th scope="col">$Total</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=0;
    $totalprice=0;
    while ($i < $num) {
    $assoarray = mysqli_fetch_assoc($result);
    $movieNum = $assoarray["pno"];
    $movieName = $assoarray["pname"];
    $moviePrice = $assoarray["price"];
    $movieQty = $assoarray["qty"];
    $cartnum   = $assoarray["cartno"];
    $movieAvailQty = $assoarray["qoh"];
    $modifyarrayIndex[$i] = $cartnum;
    $totalcurrent=0;
    $totalcurrent=($moviePrice*$movieQty);
    $totalprice+=$totalcurrent;
    ?>
    <?php echo "<tr>"; ?>
    
    <?php echo  "<th scope='row'>$cartnum</th>"; ?>
    <?php echo  "<td>$movieNum</td>"; ?>
     <?php echo  "<td>$movieName</td>"; ?>
     <?php echo  "<td>$moviePrice</td>"; ?>
     <?php echo  "<td>$movieAvailQty</td>";?>
     <?php echo "<td>"; ?>

     <?php echo "<div class='form-group' style='width:50%;'>"; ?>    
     <?php echo "<input type='number' class='form-control'  form='modifycart' placeholder='$movieQty' name='modifyinputarray[$cartnum]'>"; ?>
     
     <?php echo "</div>"; ?>
     <?php echo "</td>"; ?> 
     <?php echo  "<td>$totalcurrent</td>"; ?>  
     <?php echo "</tr> "; ?>
     <?php
    $i++;    
    }
    ?>
    <tr>
      <td colspan="6"> </td>
      <?php echo  "<td colspan='1'>$totalprice</td>"; ?> 
    </tr>
  </tbody>
</table>
<?php echo "<button type='submit' form='modifycart' name='modifycart' class='btn btn-xs btn-outline-primary '>Modify Cart</button>";?>
<?php echo "<button type='submit' form='modifycart' name='checkout' class='btn btn-xs btn-outline-success '>Checkout</button>";?>
<?php echo "</form>"; ?>
  </div>
</div>
</body>
</html>
<?php
}
$modifyinputarray = array();
if(isset($_POST['modifyinputarray'])){
    $modifyinputarray = $_POST['modifyinputarray'];    
    $_SESSION['modifymovieQty'] = $_POST['modifyinputarray'];
    $_SESSION['modifymovieIndex'] = $modifyarrayIndex;
    $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    for($counter = 0; $counter < sizeof($modifyarrayIndex); $counter++)
	{   
        $index = $modifyarrayIndex[$counter];
        $qty= $modifyinputarray[$modifyarrayIndex[$counter]];
        $parts_query= "SELECT p.qoh FROM cart AS c, parts AS p WHERE c.pno=p.pno AND c.cartno ='$index'"; 
        $result=mysqli_query($dbconnection, $parts_query);
        $movieAvailQty = $assoarray["qoh"];
        if (($movieAvailQty - $qty) <0){
            array_push($errors, "Not Enough Available QTY for movie# $index");
        }
        if($qty<0){
            array_push($errors, "Cannot have negative QTY for movie# $index");
        }
        if (count($errors)==0){
            if (($qty==0) && (strlen($modifyinputarray[$modifyarrayIndex[$counter]])!=0)){
                $parts_query= "DELETE FROM cart WHERE cartno='$index'"; 
                $result=mysqli_query($dbconnection, $parts_query);
            }
            if ($qty>0){
                $parts_query= "UPDATE cart SET qty='$qty' WHERE cartno='$index'"; 
                $result=mysqli_query($dbconnection, $parts_query);
            }

        }
    }
    mysqli_close($dbconnection);

    var_dump($_SESSION['modifymovieQty']);
}
if(isset($_POST['checkout'])){
    $dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $i=0;
    $timestamp=date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
    $splitTimeStamp = explode(" ",$timestamp);
    $parts_query= "SELECT c.pno, c.qty FROM cart as c WHERE cno='$cno'";
    $result=mysqli_query($dbconnection, $parts_query);
    $num=mysqli_num_rows($result);
    if($num!=0){
        $date = $splitTimeStamp[0];
        $time = $splitTimeStamp[1];
        $parts_query= "INSERT INTO orders (cno, received, recievedtime) VALUES('$cno','$date','$time')";
        mysqli_query($dbconnection, $parts_query);

        $parts_query= "SELECT ono FROM orders WHERE received ='$date' AND recievedtime='$time'";
        $result=mysqli_query($dbconnection, $parts_query);
        $assoarray = mysqli_fetch_assoc($result);
        $ono=$assoarray["ono"];

        $parts_query= "SELECT c.pno, c.qty FROM cart as c WHERE cno='$cno'";
        $result=mysqli_query($dbconnection, $parts_query);
        $num=mysqli_num_rows($result);
        while ($i < $num) {
            $assoarray = mysqli_fetch_assoc($result);
            $movieNum = $assoarray["pno"];
            $movieQty = $assoarray["qty"];
            $parts_query= "INSERT INTO odetails (ono, pno, qty) VALUES('$ono','$movieNum','$movieQty')";
            mysqli_query($dbconnection, $parts_query);
            $i++;  
        }
        $parts_query= "DELETE FROM cart WHERE cno='$cno'";
        mysqli_query($dbconnection, $parts_query);
    }
    mysqli_close($dbconnection);
}
}
else {
echo"<script>location.href='/OnlineShoppingSystem/WebsiteLogin.php'</script>";
}
?>