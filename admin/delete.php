<?php
include "..\Log in\config.php";
session_start();

// Only allow DELETE via POST (CSRF-safe) or with token validation
// As a minimal upgrade: use prepared statement + integer validation
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: ..\admin\admin.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM user_form WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ..\admin\admin.php?msg=User+deleted+successfully");
} else {
    header("Location: ..\admin\admin.php?msg=Delete+failed");
}

$stmt->close();
exit;
?>
