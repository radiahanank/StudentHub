<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

$message = "";

if (isset($_POST['delete'])) {

$id = $_POST['id'];

$conn->query("DELETE FROM ProgrammeModules WHERE ProgrammeID='$id'");
$conn->query("DELETE FROM InterestedStudents WHERE ProgrammeID='$id'");
$conn->query("DELETE FROM Programmes WHERE ProgrammeID='$id'");

$message = "Programme deleted!";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
</head>

<body>

<div class="container">

<h2>Delete Programme</h2>

<form method="POST">

<input type="text" name="id" placeholder="Programme ID" required>

<button name="delete" class="btn">Delete</button>

</form>

<?php if ($message != ""): ?>
    <p><?php echo $message; ?></p>

    <br>
    <a href="dashboard.php" class="btn">⬅ Go to Dashboard Now</a>
<?php endif; ?>

</div>

</body>
</html>