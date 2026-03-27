<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

$message = "";

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $programme = $_POST['programme'];

    $conn->query("INSERT INTO InterestedStudents (StudentName, Email, ProgrammeID) 
                  VALUES ('$name', '$email', '$programme')");

    $message = "Student added successfully! Redirecting...";
    header("refresh:2; url=students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
</head>

<body>

<div class="container">

<h2>Add Student</h2>

<a href="students.php" class="btn">⬅ Back to Students</a>
<br><br>

<form method="POST">

<input type="text" name="name" placeholder="Student Name" required>
<input type="email" name="email" placeholder="Email" required>

<select name="programme" required>
<option value="">Select Programme</option>

<?php
$result = $conn->query("SELECT * FROM Programmes");
while($row = $result->fetch_assoc()){
    echo "<option value='{$row['ProgrammeID']}'>{$row['ProgrammeName']}</option>";
}
?>

</select>

<br><br>
<button name="add" class="btn">Add Student</button>

</form>

<?php if ($message != ""): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</div>

</body>
</html>