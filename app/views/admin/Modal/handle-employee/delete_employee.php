<?php
require_once('db_connnection.php');
$name = $_POST['Name'];

$conn = OpenCon();
$query = "DELETE FROM `users` 
          WHERE name = '" . $name . "';";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: manage-product.php.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}