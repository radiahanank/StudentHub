<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

$message = "";

// UPDATE description
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $description = $_POST['description'];

    // Check if programme exists first
    $check = $conn->prepare("SELECT * FROM Programmes WHERE ProgrammeID = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {

        // Update description
        $stmt = $conn->prepare("UPDATE Programmes SET Description=? WHERE ProgrammeID=?");
        $stmt->bind_param("si", $description, $id);

        if ($stmt->execute()) {
            $message = "Description updated successfully!";
        } else {
            $message = "Error updating description.";
        }

    } else {
        $message = "Programme ID not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/StudentHub/style.css">
<title>Edit Programme Description</title>
</head>

<body>

<div class="container">

<h2>Edit Programme Description</h2>

<form method="POST">

<!-- 👇 NOW YOU CAN TYPE PROGRAMME ID -->
<input type="number" name="id" placeholder="Enter Programme ID" required>

<!-- 👇 ENTER NEW DESCRIPTION -->
<textarea name="description" placeholder="Enter new description" required></textarea>

<button name="update" class="btn">Update</button>

</form>

<?php if ($message != ""): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</div>

</body>
</html>