<?php
session_start();

// Initialize product list if not already set (mock database)
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
    for ($i = 1; $i <= 100; $i++) {
        $_SESSION['products'][] = [
            'id' => uniqid(), // Random unique ID
            'title' => "Product Item $i"
        ];
    }
}

$products = $_SESSION['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q2: Edit Product Title (AJAX)</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .product-item { margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; display: flex; align-items: center; justify-content: space-between; }
        input[type="text"] { padding: 5px; width: 300px; }
        button { padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Product List (100 Items)</h1>
    <p>Click "Edit" to change a product title. It updates via AJAX.</p>

    <div id="product-container">
        <?php foreach ($products as $product): ?>
            <div class="product-item" id="product-<?php echo $product['id']; ?>">
                <span class="product-title"><?php echo htmlspecialchars($product['title']); ?></span>
                <button onclick="editProduct('<?php echo $product['id']; ?>')">Edit</button>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
