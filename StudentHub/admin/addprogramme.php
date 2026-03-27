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
    $description = $_POST['description'];
    $level = $_POST['level'];

    // ✅ Use prepared statement (safe)
    $stmt = $conn->prepare("INSERT INTO Programmes (ProgrammeName, Description, LevelID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $description, $level);

    if ($stmt->execute()) {
        $message = "Programme added successfully!";
        
        // Redirect after 2 seconds
        header("refresh:2; url=dashboard.php");
    } else {
        $message = "Error adding programme.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
<title>Add Programme</title>
</head>

<body>

<div class="container">

<h2>Add Programme</h2>

<form method="POST">

<input type="text" name="name" placeholder="Programme Name" required>

<textarea name="description" placeholder="Programme Description" required></textarea>

<select name="level" required>
    <option value="">Select Level</option>
    <option value="1">1</option>
    <option value="2">2</option>
</select>

<button name="add" class="btn">Add</button>

</form>

<?php if ($message != ""): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</div>

</body>
</html>