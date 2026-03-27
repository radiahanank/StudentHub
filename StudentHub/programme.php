<?php



if(isset($_GET['success']) && $_GET['success'] == 1){
    echo "<div style='padding:10px; background-color:#d4edda; color:#155724; border-radius:5px; margin-bottom:10px;'>
            Your interest is noted for this course!
          </div>";
}


include("includes/db.php");
include("includes/header.php");
?>

<div class="container">

<?php


// 👉 IF PROGRAMME CLICKED → SHOW DETAILS
if(isset($_GET['id']) && !empty($_GET['id'])){


$id = $_GET['id'];

// Get programme + leader
$sql = "SELECT p.ProgrammeName, p.Description, s.Name AS LeaderName
        FROM Programmes p
        LEFT JOIN Staff s ON p.ProgrammeLeaderID = s.StaffID
        WHERE p.ProgrammeID = '$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<h2 class="section-title"><?php echo $row['ProgrammeName']; ?></h2>

<div class="programme-details">

<p><strong>Programme Leader:</strong> <?php echo $row['LeaderName']; ?></p>

<p><strong>Description:</strong> <?php echo $row['Description']; ?></p>

<p><strong>Modules:</strong></p>

<!-- ✅ MODULES GRID -->
<div class="modules-grid">

<?php
// Get modules for this programme
$module_sql = "SELECT m.ModuleName, st.Name AS Teacher
               FROM ProgrammeModules pm
               JOIN Modules m ON pm.ModuleID = m.ModuleID
               LEFT JOIN Staff st ON m.ModuleLeaderID = st.StaffID
               WHERE pm.ProgrammeID = '$id'";

$module_result = mysqli_query($conn,$module_sql);

while($mod = mysqli_fetch_assoc($module_result)){
?>

<div class="module-card">

<h4><?php echo $mod['ModuleName']; ?></h4>

<p><strong>Teacher:</strong> <?php echo $mod['Teacher']; ?></p>

</div>

<?php
}
?>

</div>

</div>

<!-- REGISTER INTEREST -->
<div class="register-box">

<h3>Register Your Interest</h3>

<form action="registerinterest.php" method="POST">

<input type="hidden" name="programme_id" value="<?php echo $id; ?>">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Your Email" required>

<button type="submit" class="btn">Register</button>

</form>

</div>

<?php
}


// 👉 NO ID → SHOW ALL PROGRAMMES

else{
?>

<h2 class="section-title">Available Programmes</h2>

<div class="course-grid">

<?php

$sql = "SELECT * FROM Programmes";
$result = mysqli_query($conn,$sql);

$i = 1;

while($row = mysqli_fetch_assoc($result)){
?>

<a href="programme.php?id=<?php echo $row['ProgrammeID']; ?>" class="course-card">

<img src="images/image<?php echo $i; ?>.jpg" alt="Programme Image">

<h3><?php echo $row['ProgrammeName']; ?></h3>

</a>

<?php
$i++;
}
?>

</div>

<?php
}
?>

</div>

<?php
include("includes/footer.php");
?>