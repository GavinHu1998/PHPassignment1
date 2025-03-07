<?php 
$conn = mysqli_connect("localhost", "root", "", "ecass1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
