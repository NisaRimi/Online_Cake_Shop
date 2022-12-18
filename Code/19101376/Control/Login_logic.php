<?php
  
include_once('../Model/DBConnect.php');
   
function test_input($data) {
      
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
if ($_SERVER["REQUEST_METHOD"]== "POST") {
      
    $adminname = test_input($_POST["Name"]);
    $password = test_input($_POST["Password"]);
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $resultSet = $stmt->get_result();
    $data = $resultSet->fetch_all(MYSQLI_ASSOC);
      
    foreach($data as $user) {
          
        if(($user['Name'] == $adminname) && 
            ($user['Password'] == $password)) {
                header("Location: ../View/adminpage.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
  
?>