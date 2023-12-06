<?php

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "pizzacompany";
    $port = "3310";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db, $port) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
  
?>