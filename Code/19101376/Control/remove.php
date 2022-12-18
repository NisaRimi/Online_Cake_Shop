<!DOCTYPE html>
<html>
  
<head>
    <title>Delete</title>
</head>
  
<body>
    <center>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "cse470_project");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        $product_name =  $_REQUEST['product_name'];

          

        $sql = "DELETE FROM inventory WHERE product_name = '$product_name'";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>Delete successful.</h3>"; 
  
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>