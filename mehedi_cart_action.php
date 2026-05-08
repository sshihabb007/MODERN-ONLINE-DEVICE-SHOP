<?php
session_start();

// --- ADD TO CART ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $shihab_product_id = (int)$_POST['id'];

    if (!isset($_SESSION['sshihabb007_cart'])) {
        $_SESSION['sshihabb007_cart'] = [];
    }

    if (isset($_SESSION['sshihabb007_cart'][$shihab_product_id])) {
        $_SESSION['sshihabb007_cart'][$shihab_product_id]++;
    } else {
        $_SESSION['sshihabb007_cart'][$shihab_product_id] = 1;
    }

    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'checkout.php';
    header("Location: " . $redirect);
    exit();
}

// --- REMOVE FROM CART ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mehedi_remove_item'])) {
    $shihab_product_id = (int)$_POST['id'];
    if (isset($_SESSION['sshihabb007_cart'][$shihab_product_id])) {
        unset($_SESSION['sshihabb007_cart'][$shihab_product_id]);
    }
    header("Location: checkout.php");
    exit();
}

// --- UPDATE QUANTITY ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sshihabb007_update_qty'])) {
    $shihab_product_id = (int)$_POST['id'];
    $mehedi_qty = (int)$_POST['qty'];
    if ($mehedi_qty <= 0) {
        unset($_SESSION['sshihabb007_cart'][$shihab_product_id]);
    } else {
        $_SESSION['sshihabb007_cart'][$shihab_product_id] = $mehedi_qty;
    }
    header("Location: checkout.php");
    exit();
}

// --- CLEAR CART ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['shihab_clear_cart'])) {
    $_SESSION['sshihabb007_cart'] = [];
    header("Location: checkout.php");
    exit();
}

header("Location: products.php");
exit();
?>
