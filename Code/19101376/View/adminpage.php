<?php
  
  session_start();

  //Creating Connection with the database
  
  $conn = mysqli_connect('localhost', 'root', '', 'cse470_project') or die("connection not established");
  
// Checking for connections
if ($conn->connect_error) {
    die('Connect Error (' . 
    $conn->connect_errno . ') '. 
    $conn->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM inventory ORDER BY product_ID ASC ";
$result = $conn->query($sql);
$conn->close(); 
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
        <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
</head>
  
<body>
    <section>
        <h1>INVENTORY</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>product_ID</th>
                <th>product_name</th>
                <th>quantity</th>
                <th>Price in Taka</th>

            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['product_ID'];?></td>
                <td><?php echo $rows['product_name'];?></td>
                <td><?php echo $rows['quantity'];?></td>
                <td><?php echo $rows['Price in Taka'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>

    <center><p><a href=AdminEdit.php><b>View all user</b></a></p></center>
    <center><p><a href=add.php><b>Add Product</b></a></p></center>
    <center><p><a href=delete.php><b>delete product</b></a></p></center>
</body>
  
</html>