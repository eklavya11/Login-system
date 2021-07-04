<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "users";

$con = mysqli_connect($servername,$username,$password,$database);

if($con){
    //echo "Database connected";
}
else{
    die("error".mysqli_connect_error());
}
?>