<?php
require 'includes/shihab_db_connect.php';
global $shihab_pdo;
$stmt = $shihab_pdo->query('SELECT id, name, category, image_url FROM shihab_products');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
