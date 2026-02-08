<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>User Dashboard</title></head>
<body>
    <h1>Welcome User!</h1>
    <p>You have access to basic content.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
