<?php
session_start();

//Create a database connection
$dbhost = "localhost";
$dbuser = "root";  
$dbpass = "866419dhn";
$dbname = "onlineshoppingsystem";
$name = "";
$street = "";
$city = "";
$state = "";
$zip = "";
$phone = "";
$email = "";
$pswd1 = "";
$pswd2 = "";
$errors = array();
//Connect to Database
$dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
     mysqli_connect_error() . " (" > mysqli_connect_errno() . ")" );
}

//Check for register submit
if (isset($_POST['register'])){
    if (isset($_POST['name'])){
        $name = mysqli_real_escape_string($dbconnection,$_POST['name']);
    }
    if (isset($_POST['street'])){
        $street = mysqli_real_escape_string($dbconnection,$_POST['street']);
    }
    if (isset($_POST['city'])){
        $city = mysqli_real_escape_string($dbconnection,$_POST['city']);
    }
    if (isset($_POST['state'])){
        $state = mysqli_real_escape_string($dbconnection,$_POST['state']);
    }
    if (isset($_POST['zip'])){
        $zip = mysqli_real_escape_string($dbconnection,$_POST['zip']);
    }
    if (isset($_POST['phone'])){
        $phone = mysqli_real_escape_string($dbconnection,$_POST['phone']);
    }
    if (isset($_POST['email'])){
        $email = mysqli_real_escape_string($dbconnection,$_POST['email']);
    }
    if (isset($_POST['pswd1'])){
        $pswd1 = mysqli_real_escape_string($dbconnection,$_POST['pswd1']);
    }
    if (isset($_POST['pswd2'])){
        $pswd2 = mysqli_real_escape_string($dbconnection,$_POST['pswd2']);
    }
    
    // Make sure not Null attributes need to be filled in
    if(empty($name)){
        array_push($errors, "Customer Name is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($pswd1)){
        array_push($errors, "Password is required");
    }
    if(empty($pswd2)){
        array_push($errors, "Confirms Password is required");
    }
    // Make sure passwords match
    if($pswd1!=$pswd2){
        array_push($errors, "Passwords do not match");
    }
    //Check for duplicate email
    $checkDuplicateEmail_query = "SELECT * FROM customers WHERE email='$email' LIMIT 1";
    $result=mysqli_query($dbconnection, $checkDuplicateEmail_query);
    $assoarray = mysqli_fetch_assoc($result);
    if ($assoarray){
        if($assoarray['email']==$email){
            array_push($errors, "Email already exists");
        }
    }
    //if no errors register user
    if (count($errors)==0){
        $insert_query= "INSERT INTO customers (cname,street,city,state,zip,phone,email,password) 
                        VALUES ('$name', '$street', '$city', '$state', $zip, $phone, '$email', '$pswd1')";
        $result=mysqli_query($dbconnection, $insert_query);
        $_SESSION['email'] = $email;
        $_SESSION['$name'] = $name;
        $_SESSION['success'] = "Logged in successfully";
        header('location: /OnlineShoppingSystem/index.php');
    }
}
// Check if submit for login
if (isset($_POST['login_user'])){
    if (isset($_POST['email'])){
        $email = mysqli_real_escape_string($dbconnection,$_POST['email']);
    }
    if (isset($_POST['pswd1'])){
        $pswd1 = mysqli_real_escape_string($dbconnection,$_POST['pswd1']);
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($pswd1)){
        array_push($errors, "Password is required");
    }
    if (count($errors)==0){
        $login_query= "SELECT cname, email, password FROM customers WHERE email='$email' AND password='$pswd1'";
        $result=mysqli_query($dbconnection, $login_query);
        $assoarray = mysqli_fetch_assoc($result);
        $queryemail=$assoarray['email'];
        $queryname=$assoarray['cname'];
        $querypswd1=$assoarray['password'];
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $queryname;
            $_SESSION['success'] = "Logged in successfully";
            header('location: /OnlineShoppingSystem/index.php');
        }
        else{
            array_push($errors, "Wrong Email and Password combination");
        }
    }
}

if (isset($_POST['Search'])){
    echo "yes";
}
    mysqli_close($dbconnection);
?>