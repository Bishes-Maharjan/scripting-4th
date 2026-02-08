<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Q4: IELTS Mock Test Registration</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>IELTS Mock Test Registration</h2>

    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label>Name: <input type="text" name="name" required></label><br><br>
        
        <label>Email: <input type="email" name="email" required></label><br><br>
        
        <label>Password: <input type="password" name="password" required></label><br><small>(Min 6 chars, 1 number, 1 symbol)</small><br><br>
        
        <label>Test Type:</label><br>
        <input type="checkbox" name="test_type[]" value="Reading"> Reading
        <input type="checkbox" name="test_type[]" value="Writing"> Writing
        <input type="checkbox" name="test_type[]" value="Speaking"> Speaking
        <input type="checkbox" name="test_type[]" value="Listening"> Listening
        <br><br>
        
        <label>User Photo: <input type="file" name="photo" accept="image/*" required></label><br><small>(Max 2MB)</small><br><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
