<?php 
include('../Model/DBConnect.php'); 
 
if(isset($_POST["add_to_cart"]))
{
 if(isset($_SESSION["shopping_cart"]))
 {
 $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
 if(!in_array($_GET["id"], $item_array_id))
 {
 $count = count($_SESSION["shopping_cart"]);
 $item_array = array(
 'item_id' => $_GET["id"],
 'item_name' => $_POST["hidden_name"],
 'item_price' => $_POST["hidden_price"],
 'item_quantity' => $_POST["quantity"]
 );
 $_SESSION["shopping_cart"][$count] = $item_array;
 }
 else
 {
 echo '<script>alert("Item Already Added")</script>';
 }
 }
 else
 {
 $item_array = array(
 'item_id' => $_GET["id"],
 'item_name' => $_POST["hidden_name"],
 'item_price' => $_POST["hidden_price"],
 'item_quantity' => $_POST["quantity"]
 );
 $_SESSION["shopping_cart"][0] = $item_array;
 }
}
 
if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 if($values["item_id"] == $_GET["id"])
 {
 unset($_SESSION["shopping_cart"][$keys]);
 echo '<script>alert("Item Removed")</script>';
 echo '<script>window.location="shoping.php"</script>';
 }
 }
 }
}
 
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Shopping Cart</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
 <br />
 <div class="container">
 <br />
 <br />
 <br />
 <h3 align="center">Shoping Cart</a></h3><br />
 <br /><br />
 <?php
 $query = "SELECT * FROM inventory ORDER BY product_ID ASC";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
 while($row = mysqli_fetch_array($result))
 {
 ?>
 <div class="col-md-4">
 <form method="post" action="shoping.php?action=add&id=<?php echo $row["product_ID"]; ?>">
 <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">

 <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
 
 <h4 class="text-danger">Tk <?php echo $row["Price in Taka"]; ?></h4>
 
 <input type="text" name="quantity" value="1" class="form-control" />
 
 <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
 
 <input type="hidden" name="hidden_price" value="<?php echo $row["Price in Taka"]; ?>" />
 
 <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 
 </div>
 </form>
 </div>
 <?php
 }
 }
 ?>
 <div style="clear:both"></div>
 <br />
 <h3>Order Details</h3>
 <div class="table-responsive">
 <table class="table table-bordered">
 <tr>
 <th width="40%">Item Name</th>
 <th width="10%">Quantity</th>
 <th width="20%">Price</th>
 <th width="15%">Total</th>
 <th width="5%">Action</th>
 </tr>
 <?php
 if(!empty($_SESSION["shopping_cart"]))
 {
 $total = 0;
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 ?>
 <tr>
 <td><?php echo $values["item_name"]; ?></td>
 <td><?php echo $values["item_quantity"]; ?></td>
 <td>Tk <?php echo $values["item_price"]; ?></td>
 <td>Tk <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
 <td><a href="shoping.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
 </tr>
 <?php
 $total = $total + ($values["item_quantity"] * $values["item_price"]);
 }
 ?>
 <tr>
 <td colspan="3" align="right">Total</td>
 <td align="right">Tk <?php echo number_format($total, 2); ?></td>
 <td></td>
 </tr>
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
    <link rel="stylesheet" href="../View/login.css">
</head>
 <form action="../View/cart.php" method="post">
        <div class="login-box">
  
            <input class="button" type="submit"
                     name="login" value="Pay Now">
            
        </div>
    </form>
 <?php
 }
 ?>
 
 </table>
 </div>
 </div>
 </div>
 <br />
 </body>
</html>