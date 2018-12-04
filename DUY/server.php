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
//check if logout page is pressed
if (isset($_POST['logout'])){
    echo"<script>location.href='/OnlineShoppingSystem/logout.php'</script>";
}
//update session data
if(isset($_SESSION['success']) || isset($_SESSION['updatedinfo'])){
    $email = $_SESSION['email'];
    $login_query= "SELECT cno, cname, street, city, state, zip, phone, password FROM customers WHERE email='$email'";
        $result=mysqli_query($dbconnection, $login_query);
        $assoarray = mysqli_fetch_assoc($result);
        $_SESSION['cno']=$assoarray['cno'];
        $_SESSION['cname']=$assoarray['cname'];
        $_SESSION['street']=$assoarray['street'];
        $_SESSION['city']=$assoarray['city'];
        $_SESSION['state']=$assoarray['state'];
        $_SESSION['zip']=$assoarray['zip'];
        $_SESSION['phone']=$assoarray['phone'];
        $_SESSION['password']=$assoarray['password'];
}
//check for user update
if (isset($_POST['update'])){
    $email = $_SESSION['email'];
    $cno=$_SESSION['cno'];
    $updatename = $_SESSION['cname'];
    $updatestreet =$_SESSION['street'];
    $updatecity =$_SESSION['city'];
    $updatestate =$_SESSION['state'];
    $updatezip =$_SESSION['zip'];
    $updatephone = $_SESSION['phone'];
    $updatepswd1 = $_SESSION['password'];
    $updatepswd2 = $_SESSION['password'];
    if (isset($_POST['updatename']) && !empty($_POST['updatename'])) {
        $updatename = $_POST['updatename'];
    }
    if (isset($_POST['updatestreet'])&& !empty($_POST['updatestreet'])) {
        $updatestreet =$_POST['updatestreet'];
    }
    if (isset($_POST['updatecity'])&& !empty($_POST['updatecity'])) {
        $updatecity =$_POST['updatecity'];
    }
    if (isset($_POST['updatestate'])&& !empty($_POST['updatestate'])) {
        $updatestate =$_POST['updatestate'];
    }
    if (isset($_POST['updatezip']) && !empty($_POST['updatezip'])) {
        $updatezip =$_POST['updatezip'];
    }
    if (isset($_POST['updatephone']) && !empty($_POST['updatephone'])) {
        $updatephone =$_POST['updatephone'];
    }
    if (isset($_POST['updatepswd1']) && !empty($_POST['updatepswd1'])) {
        $updatepswd1 = $_POST['updatepswd1'];
    }
    if (isset($_POST['updatepswd2']) && !empty($_POST['updatepswd2'])){
        $updatepswd2 = $_POST['updatepswd2'];
    }
    if(isset($_POST['updatepswd1'])&&isset($_POST['updatepswd2']) && !empty($_POST['updatepswd1']) && empty($_POST['updatepswd2'])){
        array_push($errors, "Confirm password is required");
    }
    if(isset($_POST['updatepswd2'])&&isset($_POST['updatepswd1']) && !empty($_POST['updatepswd2']) && empty($_POST['updatepswd1'])){
        array_push($errors, "Enter password is required");
    }
    if($updatepswd1!=$updatepswd2){
        array_push($errors, "Update passwords do not match");
    }
    print($updatename);
    print($updatestreet);
    print($updatecity);
    print($updatestate);
    print($updatezip);
    print($updatephone);
    print($email);
    print($updatepswd1);
    print($updatepswd2);
    if (count($errors)==0){
        if($_SESSION['cname']!=$updatename){
            $update_name= "UPDATE customers SET cname='$updatename' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_name);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update name");
        }
        if($_SESSION['street']!=$updatestreet){
            $update_street= "UPDATE customers SET street='$updatestreet' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_street);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update street");
        }
        if($_SESSION['city']!=$updatecity){
            $update_city= "UPDATE customers SET city='$updatecity' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_city);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update city");
        }
        if($_SESSION['state']!=$updatestate){
            $update_state= "UPDATE customers SET state='$updatestate' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_state);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update state");
        }
        if($_SESSION['zip']!=$updatezip){
            $update_zip= "UPDATE customers SET zip='$updatezip' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_zip);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update zip");
        }
        if($_SESSION['phone']!=$updatephone){
            $update_phone= "UPDATE customers SET phone='$updatephone' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_phone);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update phone");

        }
        if($_SESSION['password']!=$updatepswd1){
            $update_password= "UPDATE customers SET password='$updatepswd1' WHERE cno='$cno' AND email='$email'";
            $result=mysqli_query($dbconnection, $update_password);
            $_SESSION['updatedinfo'] = "Update in successfully";
            print("update password");
        }
        echo"<script>location.href='/OnlineShoppingSystem/updateuser.php'</script>";
    }
}
//if search
if(isset($_POST['search'])){
    $_SESSION['search']=$_POST['search'];
    if(isset($_POST['inputarray'])){
        $_SESSION['movieQty'] = $_POST['inputarray'];
    }
   echo"<script>location.href='/OnlineShoppingSystem/search.php'</script>";
}

if (isset($_POST['cart'])){
    $_SESSION['cart']=$_POST['cart'];
    print("isset");
   echo"<script>location.href='/OnlineShoppingSystem/viewcart.php'</script>";  
}
if (isset($_POST['modifycart'])){
    print(" modify isset");
}
mysqli_close($dbconnection);
?>
