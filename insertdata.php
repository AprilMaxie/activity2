<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST["studentId"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];

    $sql = "INSERT INTO user (studentId, firstName, middleName, lastName, dateOfBirth, email, phoneNumber)
            VALUES ('$studentId', '$firstName', '$middleName', '$lastName', '$dateOfBirth', '$email', '$phoneNumber')";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['status'] = "Record inserted successfully";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $con->error;
        $_SESSION['status_code'] = "error";
    }

    $con->close();
    header("Location: index.php");
    exit();
}
?>
