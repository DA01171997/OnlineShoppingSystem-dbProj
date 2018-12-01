<?php

require 'config.php'; // includes the config of php
session_start(); // start the session

$check_user = $_SESSION['login_user']; // this logins the user

$ses_sql = mysqli_query($db,"SELECT cname from customers where cname = '$user_check' "); // gets the username from customers

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC); // gets the array
   
   $login_session = $row['cname']; // gets the username
   
   if(!isset($_SESSION['login_user'])){ // tries to login
      header("location:login.php"); // if we can't we are transfered to another program
   }
?>
