<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library System</title>
        <link rel="stylesheet" type="text/css" href="./StyleSheet.css"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">

    </head>
    <body>
        <?php
        $servername = "localhost";
        $database = "lms";
        $username = "root";
        $password = "1214";
        $Name = $Age = $Contact = $Password ="" ;  //Variable Declaration 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Assigning of value obtained using post method in php variable
        $Name = $_POST['name'];
        $Age = $_POST['age'];
        $Contact =$_POST['contact'];
        $Password = $_POST['password']; //Assigning of value obtained using post method in php variable is done
        
        $con= mysqli_connect("localhost", "root","1214", "lms",3306, "C:/xampp/mysql/mysql.sock") ; // this line connect databases
        
        //Sql Queries for inserting the values into the table which is obtain during the entering of name , age , contact etc at registration page
        $query = "INSERT INTO testtable (age ,contact,name,password) VALUES('$Age', '$Contact','$Name','$Password' )";
        $result = mysqli_query($con,$query);
        if($result){
            echo("Registration Succesful");
        }
        else{
           echo("Fail");
        }
        } 
        ?>
     <!-- form genaration ,Registration page input form is made -->
    <form action="" method="post" >
    <div class="center">
    <h1>Library Registration</h1>
    <level>NAME</level></br><input type = "text" name = "name"></br>
    <level>AGE</level></br><input type =" text" name ="age"></br>
    <level>CONTACT</level></br><input type =" text" name ="contact"></br>
    <level>PASSWORD</level></br><input type =" text" name ="password"></br></br>
    <button class ="btn" type="Submit" name ="submit" value ="Register">Update</button>
    </div>
    </form>
     
     <img class="index-img" src="imgbook.jpg" alt="book pic">
    </body>
</html>
