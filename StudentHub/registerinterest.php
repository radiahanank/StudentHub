<?php
include("includes/db.php");

if(isset($_POST['email'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $programme_id = $_POST['programme_id'];

    $sql = "INSERT INTO InterestedStudents (StudentName, Email, ProgrammeID)
            VALUES ('$name','$email','$programme_id')";

    mysqli_query($conn,$sql);

    // Redirect with success message
    header("Location: programme.php?id=$programme_id&success=1");
}
?>