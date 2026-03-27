<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
</head>

<body>

<div class="container">

<h2>Interested Students</h2>
<a href="dashboard.php" class="btn">⬅ Back to Dashboard</a>
<br><br><br>
<a href="addstudent.php" class="btn">+ Add New Student</a>
<br><br>

<table border="1" cellpadding="10">

<tr>
<th>Name</th>
<th>Email</th>
<th>Programme</th>
<th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT s.StudentName, s.Email, p.ProgrammeName 
FROM InterestedStudents s
JOIN Programmes p ON s.ProgrammeID = p.ProgrammeID");

while($row = $result->fetch_assoc()){
echo "<tr>
<td>{$row['StudentName']}</td>
<td>{$row['Email']}</td>
<td>{$row['ProgrammeName']}</td>
<td>
    <a href='deletestudent.php?email={$row['Email']}' 
       class='btn' 
       onclick=\"return confirm('Are you sure you want to delete this student?')\">
       Delete
    </a>
</td>
</tr>";
}
?>

</table>

</div>

</body>
</html>