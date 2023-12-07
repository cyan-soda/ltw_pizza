<?php
require_once('db_connection.php');
$id = $_POST['id'];
$name = $_POST['name'];
$province = $_POST['province'];
$district = $_POST['district'];
$ward = $_POST['ward'];
$street = $_POST['street'];

$conn = OpenCon();

// Thêm các trường cần cập nhật vào câu lệnh UPDATE
$query = "
    UPDATE `branch` 
    SET 
        Name = '" . $name . "',
        Province = '" . $province . "',
        District = '" . $district . "',
        Ward = '" . $ward . "',
        Street = '" . $street . "'
    WHERE 
        Branch_ID = '" . $id . "'
";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: ../../manage-branch.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
