<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $conn->query("DELETE FROM InterestedStudents WHERE Email='$email'");

    header("Location: students.php");
}
?>