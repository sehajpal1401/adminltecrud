<?php
include "config/dbcon.php";

$id = $_GET['id'];

$sql = "DELETE FROM `projects` WHERE project_id = $id";

$result=mysqli_query($con,$sql);

header('location:index.php');

mysqli_close($con);
?>