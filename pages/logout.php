<?php 
session_start();

// destroy
session_destroy();

header("location:../index.php?status=logout");

?>