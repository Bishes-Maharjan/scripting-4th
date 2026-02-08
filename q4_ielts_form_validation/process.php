<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $data = [];

    // 1. Name Validation (No numbers or symbols)
    $name = trim($_POST['name']);
    if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name must not be empty and should not contain numbers or symbols.";
    } else {
        $data['name'] = $name;
    }

    // 2. Email Validation
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        $data['email'] = $email;
    }

    // 3. Password Validation (Min 6 chars, 1 number, 1 symbol)
    $password = $_POST['password'];
    if (strlen($password) < 6 || !preg_match("/[0-9]/", $password) || !preg_match("/[\W_]/", $password)) {
        $errors[] = "Password must be at least 6 characters and contain at least one number and one symbol.";
    } else {
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    // 4. Test Type Validation (Not empty)
    if (empty($_POST['test_type'])) {
        $errors[] = "Please select at least one test type.";
    } else {
        $data['test_type'] = implode(", ", $_POST['test_type']);
    }

    // 5. User Photo Validation (Size < 2MB)
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileSize = $_FILES['photo']['size'];
        if ($fileSize > 2 * 1024 * 1024) { // 2MB in bytes
            $errors[] = "File size must be less than 2MB.";
        } else {
            // In a real app, move_uploaded_file() here
            $data['photo_name'] = $_FILES['photo']['name'];
        }
    } else {
        $errors[] = "Please upload a valid photo.";
    }

    // Final Output
    if (empty($errors)) {
        echo "<h3 style='color:green'>Validation Successful!</h3>";
        echo "Data ready for database insertion:<br>";
        echo "<pre>" . print_r($data, true) . "</pre>";
    } else {
        echo "<h3 style='color:red'>Validation Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li style='color:red'>$error</li>";
        }
        echo "</ul>";
        echo "<a href='form.php'>Go Back</a>";
    }
}
?>
