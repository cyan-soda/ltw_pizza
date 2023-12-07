<?php
require_once('db_connnection.php');
$id = $_POST['Employee_ID'];
$name = $_POST['Name'];
$phone = $_POST['Phone_Number'];
$email = $_POST['Email'];
$password = $_POST['Password'];


$conn = OpenCon();
$query = "INSERT INTO `users` (name, phone, email, password) 
          VALUES ('" . $name . "', '" . $phone . "', '" . $email . "', '" . $password . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: manage-product.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}