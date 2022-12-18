<?php include('../Model/DBConnect.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
<form action="../Control/Login_logic_user.php" method="post">
        <div class="login-box">
            <h1>User Login</h1>
  
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Name"
                         name="Name" value="">
            </div>
  
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="Password" placeholder="Password"
                         name="Password" value="">
            </div>
  
            <input class="button" type="submit"
                     name="login" value="Sign In">
                     <p>Not a user?<a href=../Control/registration.php><b>Register</b></a></p>
            
        </div>
    </form>
</body>