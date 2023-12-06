<?php
require_once('db_connnection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = OpenCon();

// Thêm các trường cần cập nhật vào câu lệnh UPDATE
$query = "
    UPDATE `users` 
    SET 
        name = '" . $name . "',
        email = '" . $email . "',
        password = '" . $password . "',
        phone = '" . $phone . "',
    WHERE 
        id = '" . $id . "';
";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: manage-product.php.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
