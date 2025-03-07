<?php
session_start();
$_SESSION = [];
session_destroy();
setcookie('PHPSESSID', '', time() - 3600, '/'); // clear cookie
header("Location: login.php");
exit;
