<?php 
session_start();
unset($_SESSION['user']);
/* session_destroy(); */

echo "<script>";
echo "location.href='../index.php';";
echo "</script>";

?>