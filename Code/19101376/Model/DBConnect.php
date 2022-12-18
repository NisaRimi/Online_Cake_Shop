<?php

session_start();

//Creating Connection with the database

$conn = mysqli_connect('localhost', 'root', '', 'cse470_project') or die("connection not established");
?>