<?php
require_once '../includes/shihab_db_connect.php';
require_once '../includes/shihab_security.php';

global $shihab_pdo;

$admin_user = 'admin';
$admin_pass = 'admin123';
$admin_email = 'admin@neon-axiom.net';

$customer_user = 'customer';
$customer_pass = 'customer123';
$customer_email = 'customer@neon-axiom.net';

try {
    // Insert Admin
    $admin_hash = mehedi_hash_password($admin_pass);
    $stmt1 = $shihab_pdo->prepare("INSERT IGNORE INTO sshihabb007_users (name, password, email, role) VALUES (?, ?, ?, 'admin')");
    $stmt1->execute([$admin_user, $admin_hash, $admin_email]);
    
    // Insert Customer
    $customer_hash = mehedi_hash_password($customer_pass);
    $stmt2 = $shihab_pdo->prepare("INSERT IGNORE INTO sshihabb007_users (name, password, email, role) VALUES (?, ?, ?, 'user')");
    $stmt2->execute([$customer_user, $customer_hash, $customer_email]);

    echo "Users seeded successfully!\n";
    echo "Admin: $admin_user / $admin_pass\n";
    echo "Customer: $customer_user / $customer_pass\n";
} catch (PDOException $e) {
    echo "Error seeding users: " . $e->getMessage();
}
?>
