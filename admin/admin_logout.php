<?php
session_start();
unset($_SESSION['admin_gate_authenticated']);
unset($_SESSION['admin_name']);
header('Location: ../index.php');
exit;
?>

