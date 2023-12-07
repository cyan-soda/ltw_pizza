<?php
require_once('db_connection.php');
$id = $_POST['id'];
var_dump($id); 

$conn = OpenCon();
$query = "DELETE FROM `branch` 
          WHERE Branch_ID = '" . $id . "';";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: ../../manage-branch.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}