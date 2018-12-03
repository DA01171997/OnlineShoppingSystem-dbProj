<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'config.php' ?>
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
        <a href ="logout.php"> Log Out </a> <br /> <br />  
        <form action = "search.php" method = "post">
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="text" class="form-control" id="search" placeholder="Search" name="search">
        </div>
        <input type = "submit" value = " Submit " name = "searches"/><br /> 
        </form>

        </div>

        <div class ="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-8"  id = "column1">
            <form action = "checkstatus.php"   method = "post">
                <?php
                    $errors = array();
                    require 'errors.php';
                    
                        $sql ="SELECT * FROM parts WHERE qoh > 0";
                        $result = mysqli_query($conn,$sql); 
                            
                        if (!$result) {
                            die('Invalid query: ' . $conn->error);
                        }
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $sql2 = "INSERT into cart (cartno,cno,pno,qty) VALUES (1,1,$row[pno],$row[qoh]";

                            }
                        }
                        $sql3 = "SELECT * from cart";
                        $result2 = mysqli_query($conn,$sql3); 
                        if (!$result2) {
                            die('Invalid query: ' . $conn->error);
                        }

                        if($result2->num_rows > 0)
                        {
                            echo "<table style = \"width:100%\">";
                            echo "<tr>";
                            echo "<th>cno</th>";
                            echo "<th>pno</th>";
                            echo "<th>Quantity</th>";
                            echo "</tr>";

                            while($row2 = $result2->fetch_assoc())
                            {
                                echo "<tr>";
                                    echo "<th>". $row2['cno']. "</th>";
                                    echo "<th>". $row2['pno']. "</th>";
                                    //echo "<th>Quantity</th>";
                                    echo "<th>".$row2['qty']. "</th>";
                                    echo "</tr>";

                            }
                            echo "</table>";
                        }

                    
                ?>
            </form>
            <input type = "submit" value = " Submit " name = "checkstatus"/><br />                
        </div>
        
    </div>

    
</div>

</body>
</html>