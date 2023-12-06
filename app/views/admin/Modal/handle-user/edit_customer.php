<?php
require_once('db_connnection.php');
$id = $_POST['Customer_ID'];
$name = $_POST['Name'];
$phone = $_POST['Phone'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$conn = OpenCon();

// Thêm các trường cần cập nhật vào câu lệnh UPDATE
$query = "
    UPDATE `users` 
    SET 
        Name = '" . $name . "',
        Email = '" . $email . "',
        Password = '" . $password . "',
        Phone = '" . $phone . "'
    WHERE 
        id = '" . $id . "'
";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: manage-product.php.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
