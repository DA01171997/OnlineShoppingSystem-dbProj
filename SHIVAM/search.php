<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config.php'; ?>
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
        <a href ="checkout.php"> Check Out </a> <br /> <br />  
        <form action = "search.php" method = "post">
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="text" class="form-control" id="search" placeholder="Search" name="search">
        </div>
        <input type = "submit" value = " Submit " name = "searches"/><br /> 
        </form>

        </div>

        <div class ="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-8"  id = "column1">
            <?php
                $errors = array();
                include 'errors.php';
                $search = "";
                if(isset($_POST["searches"]))
                {
                    // write more code here will do it around 3 hopfully won't take too long 
                    if(isset($_POST["search"]))
                    {
                        $search = mysqli_real_escape_string($conn,$_POST["search"]);
                    }
                    if(empty($search)){
                        array_push($errors,"");
                    }
                    else {
                        $sql ="SELECT * FROM parts WHERE pname LIKE %$search%";
                        $result = mysqli_query($conn,$sql); 
                        echo "<table style = \"width:100%\">";
                        echo "<tr>";
                        echo "<th>Pnumber</th>";
                        echo "<th>Pname</th>";
                        echo "<th>Quantity</th>";
                        echo "</tr>";
                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<th>". $row['Pnumber']. "</th>";
                            echo "<th>". $row['Pname']. "</th>";
                            //echo "<th>Quantity</th>";
                            echo "<th><input type = \"text\" value = '".$row['qoh']."' style = \"width: 30px\"</th>";
                            echo "</tr>";
                        }// this is the result of the sql
                        // so we are getting the result here from there what we are going 
                        //to do is put it in a table using echo table tr etc and then from
                        //there are are going to get the input for the quantity and add that to the cart
                        //https://stackoverflow.com/questions/5678567/how-to-pass-variables-between-php-scripts
                        //https://www.youtube.com/watch?v=owZqCGIWFmY
                    }
                }
                
                
            ?>
        </div>
        
    </div>

    
</div>

</body>
</html>
