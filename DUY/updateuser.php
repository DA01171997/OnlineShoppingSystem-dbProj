<?php include('server.php'); 
if(isset($_SESSION['updatedinfo'])){
  //print($_SESSION['updatedinfo']);
}
if(isset($_SESSION['success'])){
  $cno= "Customer number";
  $name="Name";
  $street = "Street";
  $city = "City";
  $state = "State";
  $zip = "Zip";
  $phone = "Phone";
  $email = "Email";
  $pswd1 = "Enter Password";
  $pswd2 = "Confirm Password";  
  if(isset($_SESSION['success'])) {
    if(isset($_SESSION['cno'])){
      $cno=$_SESSION['cno'];
    }
    if(isset($_SESSION['cname'])){
        $name=$_SESSION['cname'];
    }
    if(isset($_SESSION['street'])){
        $street=$_SESSION['street'];
    }
    if(isset($_SESSION['city'])){
      $city=$_SESSION['city'];
    }
    if(isset($_SESSION['state'])){
      $state=$_SESSION['state'];
    }
    if(isset($_SESSION['zip'])){
      $zip=$_SESSION['zip'];
    }
    if(isset($_SESSION['phone'])){
      $phone=$_SESSION['phone'];
    }
    if(isset($_SESSION['email'])){
      $email=$_SESSION['email'];
    }
    if(isset($_SESSION['password'])){
      $pswd1=$_SESSION['password'];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update User Info </title>
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
<a class="btn btn-outline-primary" href="/OnlineShoppingSystem/index.php">Back</a>
</div>
<div class="container">
 <div class="jumbotron">
  <form method ="post" action="/OnlineShoppingSystem/updateuser.php" style="width: 70%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: #f5f5f5;
    border-radius: 0px 0px 10px 10px;">
   <h2>Update Profile</h2>
    <?php include('errors.php'); ?>
    <div class="form-group">
    <?php echo "<label for='name'>Customer Number: $cno </label>";?>
    </div>
    <div class="form-group">
    <?php echo "<label for='name'>Name: $name </label>";?>
    </div>
    <div class="form-group">
    <?php echo "<label for='name'>Email: $email </label>";?>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <?php echo"<input type='text' class='form-control' id='name' placeholder='$name' name='updatename'> ";?>
    </div>
    <div class="form-group">
      <label for="street">Street:</label>
      <?php echo"<input type='text' class='form-control' id='street' placeholder='$street' name='updatestreet'>";?>
    </div>
    <div class="form-group">
      <label for="City">City:</label>
      <?php echo"<input type='text' class='form-control' id='city' placeholder='$city' name='updatecity'>";?>
    <div class="form-group">
      <label for="State">State:</label>
      <?php echo"<input type='text' class='form-control' id='state' placeholder='$state' name='updatestate'>";?>
    </div>
    <div class="form-group">
      <label for="Zip">Zip:</label>
      <?php echo"<input type='number' class='form-control' id='zip' placeholder='$zip' name='updatezip'>";?>
    </div>
    <div class="form-group">
      <label for="Phone">Phone:</label>
      <?php echo"<input type='text' class='form-control' id='phone' placeholder='$phone' name='updatephone'>";?>
    </div>
    <div class="form-group">
      <label for="pwd1">Password:</label>
      <?php echo"<input type='password' class='form-control' id='pwd1' placeholder='$pswd1' name='updatepswd1'>";?>
    </div>
    <div class="form-group">
      <label for="pwd2">Confirms Password:</label>
      <?php echo"<input type='password' class='form-control' id='pwd2' placeholder='Confirms Password' name='updatepswd2'>";?>
    </div>
    <button type="submit" name="update" class="btn btn btn-outline-primary ">Update</button>
    <?php // &nbsp = spaces ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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