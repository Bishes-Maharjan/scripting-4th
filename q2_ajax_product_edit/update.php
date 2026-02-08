<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';

    if ($id && $title && isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as &$product) {
            if ($product['id'] === $id) {
                $product['title'] = $title;
                echo "success";
                exit;
            }
        }
    }
    echo "error";
}
?>
