<?php
require_once('db_connection.php');

$id = $_POST['id']; // Retrieve the ID from the POST data

$user_name = $_POST['user_name'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$salary = $_POST['salary'];
$jobtype = $_POST['jobtype'];

$conn = OpenCon();

// Thêm các trường cần cập nhật vào câu lệnh UPDATE
$query = "
    UPDATE `employee` 
    SET 
        UserName = '" . $user_name . "',
        Name = '" . $name . "',
        Email = '" . $email . "',
        DoB = '" . $dob . "',
        Phone_Number = '" . $phone . "',  
        Sex = '" . $sex . "',
        Salary = '" . $salary . "',
        Job_Type = '" . $jobtype . "'
    WHERE 
        Employee_ID = '" . $id . "'
";

if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: ../../manage-employee.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
