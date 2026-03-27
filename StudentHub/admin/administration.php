<?php
session_start();
include("../includes/db.php");

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM Admin WHERE Username='$user' AND Password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
</head>
<body>

<div class="login-container">

    <div class="logo" style="margin-bottom:20px;">
        StudentHub
    </div>

    <h2>Admin Login</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button name="login" class="btn">Login</button>

    </form>

    <?php if (isset($error)) echo "<p>$error</p>"; ?>

</div>

</body>
