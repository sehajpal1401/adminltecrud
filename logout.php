<?php
session_start();
include 'config/dbcon.php';
  header('location:login.php');
session_destroy();
?>