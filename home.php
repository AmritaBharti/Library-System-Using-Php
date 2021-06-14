

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
    <body class="home">
        <h1> Welcome to Library </h1>
        <?php
        //reservation
        if(isset($_POST['bookid'])){
            $bookid=$_POST['bookid'];
            $con= mysqli_connect("localhost", "root","1214", "lms",3306, "C:/xampp/mysql/mysql.sock") ; // this line connect databases
            if(mysqli_connect_errno()){
               echo "Failed to Connect to MysQL". mysqli_connect_errno();
           }
           $sql = "UPDATE books SET reserved = 'yes' Where bookid='$bookid'";
           $result= mysqli_query($con, $sql);
           if($result==1){
               echo "Reservation sucessfull";
           }else{
               echo "Reservation failed/Book not Found";
           }
        } 
        
        //searching
        if(isset($_POST['keyword'])){
            $name=$_POST['keyword'];
            
            $con= mysqli_connect("localhost", "root","1214", "lms",3306, "C:/xampp/mysql/mysql.sock") ; // this line connect databases
            if(mysqli_connect_errno()){
                echo "Failed to connect to Mysql". mysqli_connect_errno();
            }
            $sql="SELECT * FROM books where name LIKE '%$name%' and reserved LIKE '%no%'  ";
            $result= mysqli_query($con, $sql);
            //echo "Book Available In the Library for you ";
           
            echo "<table style ='width:50%' border='1'>
               <tr>
               <th>Book Id</th>
               <th>name</th>
               <th>Author</th>
               </tr>";
               if(mysqli_num_rows($result)>0){
                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr>";
                       echo "<td><center>".$row["bookid"]."</center></td>";
                       echo "<td><center>".$row["name"]."</center></td>";
                       echo "<td><center>".$row["author"]."</center></td>";
                       echo "</tr> </br>";
                   }
               }
               else{
                   echo "Book not found</br>";
               }
        }
            
            session_start();
            $username =$_SESSION['username'];
            echo "Hii  " . "$username "."</br>";
            echo "List of book in Library";
            $con= mysqli_connect("localhost", "root","1214", "lms",3306, "C:/xampp/mysql/mysql.sock") ; // this line connect databases
            if(mysqli_connect_errno()){
                echo "Failed to connect to Mysql". mysqli_connect_errno();
            }
            $sql="SELECT * FROM books ";
            $result= mysqli_query($con, $sql);
           
            echo "</br><table style ='width:50%' border='1'>
               <tr>
               <th>Book Id</th>
               <th>name</th>
               <th>Author</th>
               </tr>";
               if(mysqli_num_rows($result)>0){
                   while($row = mysqli_fetch_assoc($result)){
                       echo "<tr>";
                       echo "<td><center>".$row["bookid"]."</center></td>";
                       echo "<td><center>".$row["name"]."</center></td>";
                       echo "<td><center>".$row["author"]."</center></td>";
                       echo "</tr>";
                   }
               }
               else{
                   echo "error";
               }
            
        

      
        ?>
        
        <form role="form" id="templatemo-preferences-form" name="registration" action ="" method ="post">
            <div class="center">
                <input type="text" id="lastName" placeholder="search" name="keyword" required></br></br>
                <button type="submit" name="submit" value="Register">Search</button>
            </div>
        </form></br>
         <form role="form" id="templatemo-preferences-form" name="registration" action ="" method ="post">
            <div class="center">
                <input type="text" id="lastName" placeholder="BookId" name="bookid" required></br></br>
                <button type="submit" name="submit" value="Register">Reserve</button></br>
            </div>
        </form>
        
        
        
    </body>
</html>