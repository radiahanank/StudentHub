<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

include("../includes/header.php");
?>

<div class="container">

<h2 class="section-title">Courses</h2>

<div class="admin-grid">

<div class="admin-card">
<h3>Add Programme</h3>
<a href="addprogramme.php" class="btn">Go</a>
</div>

<div class="admin-card">
<h3>Edit Programme</h3>
<a href="edit.php" class="btn">Go</a>
</div>

<div class="admin-card">
<h3>Delete Programme</h3>
<a href="delete.php" class="btn">Go</a>
</div>

</div>

</div>

<?php include("../includes/footer.php"); ?>