<?php
    //session_start();
    //$error_counter = 0;
    include 'config.php';
    //$conn = mysqli_connect("localhost","root","","ONLINESHOPPINGSYSTEM");
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
                color: white;
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


        