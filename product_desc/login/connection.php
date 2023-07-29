<?php
error_reporting(0);
    $servername = "localhost";
    $username = "rajesh"; //your username here
    $password = "Rajesh@1234";// your password here
    $dbname="htmldata";

    $connection = mysqli_connect($servername,$username,$password,$dbname);
    
    if($connection)
    {
        echo "<h1>Connected</h1>";
    }
    else
    {
        echo "Connection faild".mysqli_connect_error();
    }
?>