<html>
<head>
<title>Online Shopping System</title>
</head>
<body>
<?php
$conn = new mysqli("localhost","root","","ONLINESHOPPINGSYSTEM");
if($conn->connect_error){
    //echo $password;
    die("Connection failed: " . $conn->connect_error);
    #echo $password;
}

?>
