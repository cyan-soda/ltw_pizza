<?php
require_once('db_connnection.php');
$id = $_POST['Branch_ID'];
$name = $_POST['Name'];
$district = $_POST['District'];
$ward = $_POST['Ward'];
$street = $_POST['Street'];


$conn = OpenCon();
$query = "INSERT INTO `users` (name, district, ward$ward, street) 
          VALUES ('" . $name . "', '" . $district . "', '" . $email . "', '" . $street . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: manage-product.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}