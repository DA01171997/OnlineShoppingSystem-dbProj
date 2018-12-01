<?php
    session_start();
   
    require "config.php";
    $error = "Success";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email =$conn->real_escape_string($_POST['email']); // gets the email from the database
        $password = $conn->real_escape_string($_POST['password']); // gets the password from the database

        $sql = "SELECT email, password FROM customers WHERE email = '$email' and password = '$password'"; // this checks to see if a person actually exists in the database
        $result = mysqli_query($conn,$sql); // this is the result of the sql
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC); // this is getting the row for it
       // $active = $row['active'];

        $count = mysqli_num_rows($result); // gets the number of rows

        if($count == 1){ // there should only be one result or something is wrong
            session_register("email");
            $_SESSION['login_user'] = $email;
            header("Location: welcome.php");
        }
        else{
            $error = "Your Login Name or Password is incorrect";
        }
    }

?>

<html>
    <head>
        <title> Welcome to Online Shopping System </title> <!-- This is the text i want to see as the title -->
        <!-- The bottom is the CSS part and it works with the type of title  -->
        <style type = "text/css"> 
            body{
                font-family:"Times New Roman",Times,serif;
                font-size:24px;
            }
            label {
                font-weight:bold;
                width:100px;
                font-size:14px;
            }
            .box{
                border:#ffffff solid 1px;

            }
        </style>
    </head>

    <body bgcolor = "#FF0000"> <!-- Sets the background color -->
            <div align = "center"> 
                <div style = "width:300px; border: solid 1px #fbbc00;  align = left"> <!-- Sets the color of the border and sets the alignment of the border -->
                    <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div><!-- Sets the color of the word Login and sets the alignment of the border -->

                    <div style = "margin:30px">

                        <form action = "" method = "post">
                            <label style = "text-align:center"> Email:   </label>
                                <input type = "text" name = "email" class = "box"/><br /><br /> 
                            <label style = "text-align:center"> Password: </label>
                                <input type = "password" name = "password" class = "box"/><br /><br /> 
                            <input type = "submit" value = " Submit "/><br />
                            <label>  Click <a href = "newuser.php">here</a> if you are a new user </label>
                        </form>
                        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
                    </div>			
                </div>
			
            </div>

     </body>
</html>

