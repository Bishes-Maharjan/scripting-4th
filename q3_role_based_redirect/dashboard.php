<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];

// Role-based redirection logic
if ($role === 'admin') {
    header("Location: admin.php");
    exit;
} elseif ($role === 'user') {
    header("Location: user.php");
    exit;
} else {
    echo "Unknown role!";
}
?>
