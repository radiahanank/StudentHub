<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: administration.php");
    exit();
}

include("../includes/header.php");
?>

<div class="container">

<h2 class="section-title">Administration Panel</h2>

<div class="admin-grid">

<a href="courses.php" class="admin-card">
<h3>Manage Courses</h3>
<p>Add, edit or delete programmes</p>
</a>

<a href="modules.php" class="admin-card">
<h3>Modules</h3>
<p>View all modules</p>
</a>

<a href="students.php" class="admin-card">
<h3>Students</h3>
<p>View registered students</p>
</a>

<a href="logout.php" class="admin-card">
<h3>Logout</h3>
<p>Exit admin panel</p>
</a>

</div>

</div>

<?php include("../includes/footer.php"); ?>
