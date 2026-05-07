<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $shihab_product_id = $_POST['id'];
    
    if (!isset($_SESSION['sshihabb007_cart'])) {
        $_SESSION['sshihabb007_cart'] = [];
    }

    if (isset($_SESSION['sshihabb007_cart'][$shihab_product_id])) {
        $_SESSION['sshihabb007_cart'][$shihab_product_id]++;
    } else {
        $_SESSION['sshihabb007_cart'][$shihab_product_id] = 1;
    }
    
    // Redirect back to referring page or cart
    $redirect = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : 'checkout.php';
    header("Location: " . $redirect);
    exit();
}
?>
