<?php
session_start();
$_SESSION['logged_in'] = false; // Or use session_destroy();
unset($_SESSION['user_id']);
header("Location: login.php");
exit;
?>
