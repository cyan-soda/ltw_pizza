<?php
require_once('db_connnection.php');
$id = $_POST['Customer_ID'];
$name = $_POST['Name'];
$phone = $_POST['Phone'];
$email = $_POST['Email'];
$password = $_POST['Password'];


$conn = OpenCon();
$query = "INSERT INTO `customer` (name, phone, email, password) 
          VALUES ('" . $name . "', '" . $phone . "', '" . $email . "', '" . $password . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: manage-product.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}