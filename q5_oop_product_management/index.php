<?php
require_once 'User.php';

// Simulate an active user
$current_user_id = 1;
$userObj = new User($current_user_id);

// Handle deletion request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $userObj->deleteProduct($_POST['delete_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Q5: OOP Product Management</title>
</head>
<body>
    <h2>User Product Management (OOP)</h2>
    
    <?php
    // Show products
    $userObj->showProducts();
    ?>

    <p><small>Note: Products are stored in Session for demo purposes.</small></p>
</body>
</html>
