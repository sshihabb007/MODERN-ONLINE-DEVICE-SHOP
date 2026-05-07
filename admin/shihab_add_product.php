<?php
require_once '../includes/shihab_db_connect.php';
require_once '../includes/shihab_security.php';
session_start();
if (!isset(<?php
require_once '../includes/shihab_db_connect.php';
require_once '../includes/shihab_security.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Basic CSRF Check
    if (!sshihabb007_validate_csrf($_POST['csrf_token'])) {
        die("CSRF Token Validation Failed");
    }

    $shihab_name = shihab_sanitize($_POST['name']);
    $shihab_price = shihab_sanitize($_POST['price']);
    $shihab_slug = strtolower(str_replace(' ', '-', $shihab_name));
    $shihab_category = shihab_sanitize($_POST['category'] ?? 'laptop');
    $shihab_description = shihab_sanitize($_POST['description'] ?? '');

    // Handle Image Upload
    $mehedi_target_dir = "../uploads/";
    $mehedi_image_name = time() . "_" . basename($_FILES["image"]["name"]);
    $mehedi_target_file = $mehedi_target_dir . $mehedi_image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $mehedi_target_file)) {
        try {
            global $shihab_pdo;
            $sshihabb007_stmt = $shihab_pdo->prepare("INSERT INTO shihab_products (name, slug, description, price, category, image_url) VALUES (?, ?, ?, ?, ?, ?)");
            $sshihabb007_stmt->execute([$shihab_name, $shihab_slug, $shihab_description, $shihab_price, $shihab_category, $mehedi_image_name]);
            header("Location: ../admin-add.php?success=1");
            exit();
        } catch(PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
SESSION['sshihabb007_role']) || <?php
require_once '../includes/shihab_db_connect.php';
require_once '../includes/shihab_security.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Basic CSRF Check
    if (!sshihabb007_validate_csrf($_POST['csrf_token'])) {
        die("CSRF Token Validation Failed");
    }

    $shihab_name = shihab_sanitize($_POST['name']);
    $shihab_price = shihab_sanitize($_POST['price']);
    $shihab_slug = strtolower(str_replace(' ', '-', $shihab_name));
    $shihab_category = shihab_sanitize($_POST['category'] ?? 'laptop');
    $shihab_description = shihab_sanitize($_POST['description'] ?? '');

    // Handle Image Upload
    $mehedi_target_dir = "../uploads/";
    $mehedi_image_name = time() . "_" . basename($_FILES["image"]["name"]);
    $mehedi_target_file = $mehedi_target_dir . $mehedi_image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $mehedi_target_file)) {
        try {
            global $shihab_pdo;
            $sshihabb007_stmt = $shihab_pdo->prepare("INSERT INTO shihab_products (name, slug, description, price, category, image_url) VALUES (?, ?, ?, ?, ?, ?)");
            $sshihabb007_stmt->execute([$shihab_name, $shihab_slug, $shihab_description, $shihab_price, $shihab_category, $mehedi_image_name]);
            header("Location: ../admin-add.php?success=1");
            exit();
        } catch(PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
SESSION['sshihabb007_role'] !== 'admin') {
    die("Unauthorized Access");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Basic CSRF Check
    if (!sshihabb007_validate_csrf($_POST['csrf_token'])) {
        die("CSRF Token Validation Failed");
    }

    $shihab_name = shihab_sanitize($_POST['name']);
    $shihab_price = shihab_sanitize($_POST['price']);
    $shihab_slug = strtolower(str_replace(' ', '-', $shihab_name));
    $shihab_category = shihab_sanitize($_POST['category'] ?? 'laptop');
    $shihab_description = shihab_sanitize($_POST['description'] ?? '');

    // Handle Image Upload
    $mehedi_target_dir = "../uploads/";
    $mehedi_image_name = time() . "_" . basename($_FILES["image"]["name"]);
    $mehedi_target_file = $mehedi_target_dir . $mehedi_image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $mehedi_target_file)) {
        try {
            global $shihab_pdo;
            $sshihabb007_stmt = $shihab_pdo->prepare("INSERT INTO shihab_products (name, slug, description, price, category, image_url) VALUES (?, ?, ?, ?, ?, ?)");
            $sshihabb007_stmt->execute([$shihab_name, $shihab_slug, $shihab_description, $shihab_price, $shihab_category, $mehedi_image_name]);
            header("Location: ../admin-add.php?success=1");
            exit();
        } catch(PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

