<?php 
include "db.php";
include "functions.php";
// if there is already a session id, it won't create a new session id.
session_start();
// session_regenerate_id();  // it will create a new session id.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>