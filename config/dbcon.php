<?php

$server = "localhost";
$username = "root";
$password= "";
$database = "phpadminpanel";

$con = mysqli_connect("$server","$username","$password","$database");

if(!$con)
{
    header("Location: ../errors/db.php");
    die();
}
 
?>