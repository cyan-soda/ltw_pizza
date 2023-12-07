<?php
require_once('db_connection.php');
$user_name = $_POST['user_name'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$salary = $_POST['salary'];
$jobtype = $_POST['jobtype'];



$conn = OpenCon();
$query = "INSERT INTO `employee` (UserName, Name, Phone_Number, Email, DoB, Sex, Salary, Job_Type) 
          VALUES ('" . $user_name . "', '" . $name . "', '" . $phone . "', '" . $email . "', '" . $dob . "', '" . $sex . "','" . $salary . "', '" . $jobtype . "')";


if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: ../../manage-employee.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}