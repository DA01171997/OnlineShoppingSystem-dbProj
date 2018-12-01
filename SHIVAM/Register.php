<?php
    //session_start();
    //$error_counter = 0;
    include 'config.php';
    //$conn = mysqli_connect("localhost","root","","ONLINESHOPPINGSYSTEM");
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
    $email = "";
    $psd1 = "";
    $psd2 = "";
    $errors = array();
    

    if(isset($_POST['register'])) { // i think this line is causing the issue because the if is false for some reason 
        
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
        if(isset($_POST['email'])) {
            $email = mysqli_real_escape_string($conn,$_POST['email']);
        }
        if(isset($_POST['psd1'])) {
            $psd1 = mysqli_real_escape_string($conn,$_POST['psd1']);
        }
        if (isset($_POST['psd2'])){
            $psd2 = mysqli_real_escape_string($conn,$_POST['psd2']);
        }
    

        if(empty($name)){
            array_push($errors, "Name is required");
            //echo "Name is required";
        }
        else{
            if(empty($email)){
                array_push($errors, "Email is required");
            }
            else {
                if(empty($email)){
                    array_push($errors, "Email is required");
                }
                else {
                    if(empty($psd1)) {
                        array_push($errors, "Password is required");
                    }
                    else {
                        if(empty($psd2)) {
                            array_push($errors, "Confirm is required");
                        }
                        else {
                            if($psd1 != $psd2) {
                                array_push($errors, "Passwords not match");
                            }
                            else
                            {
                                $sql = "SELECT * FROM customers WHERE email = '$email'";
                                $result = mysqli_query($conn,$sql); // this is the result of the sql
                                $row = mysqli_fetch_array($result,MYSQLI_ASSOC); // this is getting the row for it
                                // $active = $row['active'];
                                $count = mysqli_num_rows($result); // gets the number of rows
                                if($count > 0) {
                                    array_push($errors, "Duplicate Email");
                                }
                                else{
                                    $insert = "INSERT INTO customers (`cname`,`street`,`city`,`state`,`zip`,`phone`,`email`,`password`) 
                                    VALUES ('$name', '$street', '$city', '$state', $zip, $phone, '$email', '$psd1')";   
                                    $result=mysqli_query($conn, $insert);
                                    $_SESSION['email'] = $email;

                                    $_SESSION['success'] = "Logged in successfully";
                                    header('location: index.php');
                                }
                            }
                        }

                    }
                    

                }

            }
        }
       
        

       

        


        if(count($errors) == 0) {
           
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Customer Sign-Up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <style>
            .jumbotron{
                background-color:darkblue;
                color:orange;
            }
            a {
                color: orange;
            }
        </style>
    </head>
<body style="background-color:darkblue;">

<div class = "container">
    <div class = "jumbotron">
        <h1 align="center">Online Shopping System</h1>  
        <h2>Sign Up</h2>
        <form action = "Register.php" method = "post">
            <?php require "errors.php" ?>
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
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label for="psd1">Password:</label>
                <input type="password" class="form-control" id="psd1" placeholder="Enter Password" name="psd1">
            </div>
            <div class="form-group">
                <label for="psd2">Confirms Password:</label>
                <input type="password" class="form-control" id="psd2" placeholder="Confirms Password" name="psd2">
            </div>
            <button type="submit" name="register" class="btn btn-light">Sign Up</button>
        </form>
            Already a member? <a href ="login_new.php"> Sign In</a>
        </div>
        </div>

</body>
</html>


        