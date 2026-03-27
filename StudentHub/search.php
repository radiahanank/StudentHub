<?php
include("includes/db.php");
include("includes/header.php");
?>

<div class="container">

<h2 class="section-title">Search Programmes</h2>

<form class="search-box" method="GET">

<input type="text" name="keyword" placeholder="Search course (e.g. Artificial Intelligence)">

<button type="submit" class="btn">Search</button>

</form>


<div class="course-grid">

<?php

if(isset($_GET['keyword'])){

$keyword = $_GET['keyword'];

$sql = "SELECT * FROM Programmes WHERE ProgrammeName LIKE '%$keyword%'";
$result = mysqli_query($conn,$sql);

$i = 1;

while($row = mysqli_fetch_assoc($result)){

?>

<a href="programme.php?id=<?php echo $row['ProgrammeID']; ?>" class="course-card">

<img src="images/image<?php echo $i; ?>.jpg">

<h3><?php echo $row['ProgrammeName']; ?></h3>

</a>

<?php

$i++;

}

}

?>

</div>

</div>

<?php
include("includes/footer.php");
?>