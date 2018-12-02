<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <style>
.jumbotron{
    background-color:darkblue;
    color:orange;
}
a {
    color: white;
}
html,body {
    height:100%;
    
}
#column1{
    height:100%;
    background-color: darkblue;
    color:orange;
}
</style>
</head>
<body style="background-color:darkblue;">
<div class="container-fluid h-100">
    <div class="jumbotron">
        <h1 align="center">WELCOME</h1>
    </div>

    <div class = "row justify-content-center h-100">
        <div class = "col-4 hidden-md-down" id = "column1">
        Customer Menu <br /> <br />
        <a href ="checkout.php"> Check Out </a> <br /> <br />  
        <a href ="checkstatus.php"> Check Order Status </a> <br /> <br /> 
        <a href ="updateprofile.php"> Update Profile </a> <br /> <br /> 
        <a href ="cart.php"> View/Edit Cart </a> <br /> <br /> 
        <a href ="logout.php"> Log Out </a> <br /> <br />  
        <form action = "search.php" method = "post">
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="text" class="form-control" id="search" placeholder="Search" name="search">
        </div>
        <input type = "submit" value = " Submit " name = "searchs"/><br /> 
        </form>

        </div>

        <div class ="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-8"  id = "column1">
         <?php
            include 'config.php';
            if($conn->connect_error){
                //echo $password;
                die("Connection failed: " . $conn->connect_error);
                #echo $password;
            }

            $name = "";
            $street = "";
            $city = "";
            $state = "";
            $zip = "";
            $phone = "";
            //$email = "";
            $psd1 = "";
            $psd2 = "";
            $errors = array();

            

            if(isset($_POST['update'])) {
                if(isset($_POST['name'])) {
                    $name = mysqli_real_escape_string($conn,$_POST['name']);
                }
                if(isset($_POST['street'])) {
                    $street = mysqli_real_escape_string($conn,$_POST['street']);
                }
                if(isset($_POST['city'])) {
                    $city = mysqli_real_escape_string($conn,$_POST['city']);
                }
                if (isset($_POST['state'])) {
                    $state = mysqli_real_escape_string($conn,$_POST['state']);
                }
                if(isset($_POST['zip'])) {
                    $zip = mysqli_real_escape_string($conn,$_POST['zip']);
                }
                if(isset($_POST['phone'])) {
                    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
                }
                if(isset($_POST['psd1'])) {
                    $psd1 = mysqli_real_escape_string($conn,$_POST['psd1']);
                }
                if (isset($_POST['psd2'])){
                    $psd2 = mysqli_real_escape_string($conn,$_POST['psd2']);
                }

                if(empty($name)){
                    array_push($errors, "Name is required");
                }
                else{
                        if(empty($psd1)) {
                            array_push($errors, "Password is required");
                        }
                        else{
                            if(empty($psd2)) {
                                array_push($errors, "Confirm is required");
                            }
                            else{
                                $email = $_SESSION['email'];
                                    if($psd1 != $psd2) {
                                        array_push($errors, "Passwords not match");
                                    }
                                    else{
                                        $sql = "UPDATE customers Set name = $name, street = $street, city = $city, state = $state, zip = $zip, psd1 = $psd1, psd2 = $psd2 where email = $email";
                                        query($sql);
                                    }
                            }
                        }
                        
                    }
            }
            // add the html stuff after wards tomorrow morning probably copy from register.php
         ?>
            <h2> Update Profile</h2>
            <form action =  "updateprofile.php" method = "post">
            <?php require 'errors.php';?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" id="street" placeholder="Street" name="street">
            </div>
            <div class="form-group">
                <label for="City">City:</label>
                <input type="text" class="form-control" id="city" placeholder="City" name="city">
            </div>
            <div class="form-group">
                <label for="State">State:</label>
                <input type="text" class="form-control" id="state" placeholder="State" name="state">
            </div>
            <div class="form-group">
                    <label for="Zip">Zip:</label>
                    <input type="number" class="form-control" id="zip" placeholder="Zip" name="zip">
            </div>
            <div class="form-group">
                    <label for="Phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
            </div>
            <div class="form-group">
                <label for="psd1">Password:</label>
                <input type="password" class="form-control" id="psd1" placeholder="Enter Password" name="psd1">
            </div>
            <div class="form-group">
                <label for="psd2">Confirms Password:</label>
                <input type="password" class="form-control" id="psd2" placeholder="Confirms Password" name="psd2">
            </div>
            <button type="submit" name="update" class="btn btn-light">Update</button>
            </form>
           

        </div>
        
    </div>

    
</div>

</body>
</html>
