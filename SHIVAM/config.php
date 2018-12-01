<html>
<head>
<title>Online Shopping System</title>
</head>
<body>
<?php
session_start();
 $conn = mysqli_connect("localhost","root","","ONLINESHOPPINGSYSTEM");
if($conn->connect_error){
    //echo $password;
    die("Connection failed: " . $conn->connect_error);
    #echo $password;
}

?>
