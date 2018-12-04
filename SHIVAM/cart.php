<?php 
  include 'config.php'; 
  if(isset($_SESSION['email']))
  {
    $email = $_SESSION['email'];

  }
  else
  {
      $email = "no email found";
  }

  $sql_test = "SELECT * from customers where email = '$email'";
  if($conn->query($sql_test))
  {
      echo "RECORD SUCCESSFULLY found";
  }
  else
  {
      echo "Error " . $sql_test . "<br>" . $conn->error;
  }
  $arrayIndex = array();
  $result=mysqli_query($conn, $sql_test);
  $row = $result->fetch_assoc();
  $name = $row['cname'];
  $cno = $row['cno'];
  

?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
   
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
                if(isset($_GET['formCart'])){
                    echo "<form method = get action=  form name=formCart>";
                $searchpname = strtolower($_POST['cart']);
                $dbconnection = mysqli_connect("localhost", "root", "", "ONLINESHOPPINGSYSTEM");
                $parts_query= "SELECT * from  cart";
                $result=mysqli_query($dbconnection, $parts_query);
                if (!$result) {
                    die("Database query failed.");
                }
                $num=mysqli_num_rows($result);  
                mysqli_close($dbconnection);
                //}  
                ?> 
                <?php 
                echo "<h1 align='center'>Welcome $name
                <p>Here are our movies</p></h1>"; 
                ?>
                 <?php //echo "<form method ='post' id='cart' action='cart.php' name = cart style=' width: 90%; border: 1px solid #B0C4DE; border-radius: 0px 0px 10px 10px; background: orange; margin: 0px auto; padding: 20px;'>";?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Cart Number </th>
                            <th scope="col">Cno</th>
                            <th scope="col">Pno</th>
                            <th scope="col">QTY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                
                                while ($i < $num) {
                                $assoarray = mysqli_fetch_assoc($result);
                                $cartno = $assoarray["cartno"];
                                $cno = $assoarray["Cno"];
                                $pno = $assoarray["Pno"];
                                $qty = $assoarray["qty"];
                                $arrayIndex[$i] = $cartno;
                                $inputarray[$cartno]=$assoarray["qty"];
                                ?>
                                <?php echo "<tr>"; ?>
                                
                                <?php echo  "<th scope='row'>$cartno</th>"; ?>
                                <?php echo  "<td>$cno</td>"; ?>
                                <?php echo  "<td>$pno</td>"; ?>
                                <?php echo "<td>"; ?>

                                <?php echo "<div class='form-group' style='width:40%;'>"; ?>    
                                <?php echo "<input type='number' class='form-control'  form='cart' placeholder='0' name='inputarray[$cartno]'>"; ?>
                                
                                <?php echo "</div>"; ?>

                                <?php echo "</td>"; ?>  
                                <?php echo "</tr> "; ?>
                                <?php
                                $i++;    
                                }
                            
                           echo" </tbody>";
                           echo"</table>";
                            
                           echo" </div>";
                           echo" </div>";
                           echo" </body>";
                           echo" </html>";
                            
                }
                else
                {
                    echo "NOTHING IS HAPPENING";
                    echo $email;
                } 
                ?>
                <button type='submit' form='get' name='formCart' class='btn btn-xs btn-outline-primary '>AddCart</button>
                
                </form>
                <?php
                $inputarray = array();
                if(isset($_POST['inputarray'])){
                    $inputarray = $_POST['inputarray'];    
                    $_SESSION['movieQty'] = $_POST['inputarray'];
                    $_SESSION['movieIndex'] = $arrayIndex;
                    $conn = mysqli_connect("localhost", "root", "", "ONLINESHOPPINGSYSTEM");
                    for($counter = 0; $counter < sizeof($arrayIndex); $counter++)
                    {
                        $index = $arrayIndex[$counter];
                        $qty= $inputarray[$arrayIndex[$counter]];
                        $parts_query= "UPDATE cart set qty = $qty where cartno =  $cartno"; 
                        $result=mysqli_query($conn, $parts_query);
                    }
                    mysqli_close($conn);
                    //var_dump($_SESSION['movieQty']);
                }
                
?>
                
                
                
            </div>
            
        </div>

        
    </div>

    </body>
    </html>
