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
        <a href ="cart.php?name = cart"> View/Edit Cart </a> <br /> <br /> 
        <a href ="logout.php"> Log Out </a> <br /> <br />  
        <form action = "search.php" method = "post">
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="text" class="form-control" id="search" placeholder="Search" name="search">
        </div>
        <input type = "submit" value = " Submit " name = "searchs"/><br /> 
        </form>

        </div>

        <div class ="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-8"  id = "column1">
                    
        </div>
        
    </div>

    
</div>

</body>
</html>
