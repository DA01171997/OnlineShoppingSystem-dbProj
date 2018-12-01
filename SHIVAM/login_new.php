<?php  include 'config.php'; ?>

<?php
   // session_start();

   if($conn->connect_error){
    //echo $password;
    die("Connection failed: " . $conn->connect_error);
    #echo $password;
}
   
    //require "config.php";
    $errors = array();
    if(isset($_POST['login_user'])){

        $email =$conn->real_escape_string($_POST['email']); // gets the email from the database
        $password = $conn->real_escape_string($_POST['password']); // gets the password from the database

        $sql = "SELECT *  FROM customers WHERE email = '$email'"; // this checks to see if a person actually exists in the database
        $result = mysqli_query($conn,$sql); // this is the result of the sql
 
       // $active = $row['active'];
      //  $queryemail=$assoarray['email'];
       // $querypswd1=$assoarray['password'];
        $count = mysqli_num_rows($result); // gets the number of rows

        if($count >0){ // there should only be one result or something is wrong
            //session_register("email");
            $row = $result->fetch_assoc();
            if($row['password'] == $password)
            { // this is getting the row for it
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "Logged in successfully";
                header("Location: index.php");
            } 
            else {
                //array_push($errors,"incorrect password");
                array_push($errors,"Your Login Name or Password is incorrect");
            } 
        }
        else{
            array_push($errors,"Your Login Name or Password is incorrect");
        }
    }

?>


<!DOCTYPE html>
<html lang = "en">
<head>
    <title> Login Page </title>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width=device-width, inital-scale=1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .jumbotron{
            background-color:darkblue;
            color:orange;
        }
        a{
            color:white;
        }
    </style>
</head>

<body style = "background-color:darkblue;">

<div class= "container">
    <div class = "jumbotron">
        <h1 align = "Center"> Online Shopping Center </h1>
        <h2> Login </h2>
        <form action = "login_new.php" method = "post">
        <?php require "errors.php" ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Email:</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password">
        </div>
            <input type = "submit" value = " Submit " name = "login_user"/><br /> 
            
        </form> 
         Click <a href = "register.php">here</a> if you are a new user 
         
    </div>
</div>

<!--  $phone = "";
    $email = "";
    $psd1 = "";
    $psd2 = ""; -->