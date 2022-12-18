<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
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
        $quantity = $_REQUEST['quantity'];
        $price =  $_REQUEST['Price'];
          

        $sql = "INSERT INTO `inventory` (`product_name`, `quantity`, `Price in Taka`) VALUES ('$product_name', $quantity, $price)";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
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