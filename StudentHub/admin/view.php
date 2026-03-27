<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
</head>
<body>

<h1>Updated Programmes</h1>

<table>
<tr>
    <th>ID</th>
    <th>Programme Name</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM Programmes");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['ProgrammeID']}</td>
            <td>{$row['ProgrammeName']}</td>
          </tr>";
}
?>

</table>

</body>
</html>