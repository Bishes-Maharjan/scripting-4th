<?php
class User {
    private $user_id;
    private $db_connection;

    public function __construct($user_id) {
        $this->user_id = $user_id;
        // In a real app, you would initialize DB connection here.
        // We will mock it using $_SESSION.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Initialize mock products if not exists
        if (!isset($_SESSION['user_products'][$this->user_id])) {
            $_SESSION['user_products'][$this->user_id] = [
                101 => 'Laptop',
                102 => 'Mouse',
                103 => 'Keyboard',
                104 => 'Monitor'
            ];
        }
    }

    public function showProducts() {
        echo "<h3>Product List for User ID: {$this->user_id}</h3>";
        $products = $_SESSION['user_products'][$this->user_id];
        
        if (empty($products)) {
            echo "<p>No products found.</p>";
            return;
        }

        echo "<ul>";
        foreach ($products as $id => $name) {
            echo "<li>ID: $id - $name 
                <form method='POST' style='display:inline;'>
                    <input type='hidden' name='delete_id' value='$id'>
                    <button type='submit'>Delete</button>
                </form>
            </li>";
        }
        echo "</ul>";
    }

    public function deleteProduct($product_id) {
        if (isset($_SESSION['user_products'][$this->user_id][$product_id])) {
            unset($_SESSION['user_products'][$this->user_id][$product_id]);
            echo "<p style='color:green;'>Product ID $product_id deleted successfully.</p>";
        } else {
            echo "<p style='color:red;'>Product ID $product_id not found.</p>";
        }
    }
}
?>
