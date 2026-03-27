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

<h2>Modules</h2>
<a href="dashboard.php" class="btn">⬅ Back to Dashboard</a>
<br><br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM Modules");

while($row = $result->fetch_assoc()){
echo "<tr>
<td>{$row['ModuleID']}</td>
<td>{$row['ModuleName']}</td>
</tr>";
}
?>

</table>

</div>

</body>
</html>