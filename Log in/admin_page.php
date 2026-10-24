<?php
session_start();
// Redirect directly to admin gate or dashboard
if (!isset($_SESSION['admin_gate_authenticated']) || $_SESSION['admin_gate_authenticated'] !== true) {
    header('Location: ../admin/admin_login.php');
} else {
    header('Location: ../admin/admin.php');
}
exit;
?>
