<?php
require_once('db_connection.php');
$id = $_POST['id'];

$conn = OpenCon();
$query = "DELETE FROM `employee` 
          WHERE Employee_ID = '" . $id . "';";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: ../../manage-employee.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}