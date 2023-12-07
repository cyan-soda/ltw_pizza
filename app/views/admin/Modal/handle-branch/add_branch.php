<?php
require_once('db_connection.php');
$name = $_POST['name'];
$province = $_POST['province'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$street = $_POST['street'];


$conn = OpenCon();
$query = "INSERT INTO `branch` (Name, Province, District, Ward, Street) 
          VALUES ('" . $name . "', '" . $province . "', '" . $district . "', '" . $ward . "', '" . $street . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: ../../manage-branch.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}