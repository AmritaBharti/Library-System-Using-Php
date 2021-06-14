<html>
    <head>
        <meta charset="UTF-8">
        <title>Library System</title>
        <link rel="Stylesheet" type="text/css" media="all" href ="./StyleSheet.css" >
        <link rel="stylesheet" type="text/css" href="./StyleSheet.css"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        
    </head>
    <body>
        <?php
        
        if(isset($_POST['name'])){// inside the if condition name is received. It will check wheather the data came into php column or not
           $name = $_POST['name'];//that came data is assign into this variable
           $password = $_POST['password'];
           $con= mysqli_connect("localhost", "root","1214", "lms",3306, "C:/xampp/mysql/mysql.sock") ; // this line connect databases
           if(mysqli_connect_errno()){
               echo "Failed to Connect to MysQL". mysqli_connect_errno();
           }
           $query="SELECT * FROM testtable WHERE name ='$name' and password ='$password'"; // quwery to get name and password from database
           $result = mysqli_query($con,$query); //if connection and query both is correct then only result will get 1
           if($result){
                if(mysqli_num_rows($result)>0){ //if user is a valid user then only this code will work
                    session_start(); // session will start i.e if u want to send varalble from 1 page to another page or else u want to count the time untill which u have logged in we can use session
                    $_SESSION['username']=$name;//name is getting passes to other page
                    header("Location:home.php");//passing page is home page
                }else{
                    echo "Invalid credencial";
                }
        }
        else{
           echo("Fail");
        }  
        }
        ?>
        <!-- this is the form of login page -->
        <form role="form" id="templatemo-preferences-form" name="registration" action ="" method ="post">
            <div class="center">
                <h1>Login</h1>
                <level>NAME</level></br>
                <input type="text" id="lastName" placeholder="enter name" name="name" required></br>
                <level>PASSWORD</level></br>
                <input type="text" id="lastName" placeholder="enter password" name="password" required></br></br>
                <button type="submit" name="submit" value="Register">Login</button>
            </div>
        </form>
        <img class="login-img" src="loginimg.png" alt="quotes pic">
</body>
</html>

        
