<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $delete_id = $_POST["id"];

    $sql = "DELETE FROM user WHERE id = $delete_id";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['status'] = "Record deleted successfully";
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
