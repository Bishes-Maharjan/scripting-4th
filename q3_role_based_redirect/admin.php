<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body>
    <h1>Welcome Admin!</h1>
    <p>You have access to verify critical settings.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
