<?php
require_once('db_connnection.php');
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];


$conn = OpenCon();
$query = "INSERT INTO `users` (name, phone, email, password) 
          VALUES ('" . $name . "', '" . $phone . "', '" . $email . "', '" . $password . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: manage-product.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}