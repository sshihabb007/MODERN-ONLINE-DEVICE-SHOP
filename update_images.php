<?php
require 'includes/shihab_db_connect.php';
global $shihab_pdo;
$shihab_pdo->exec("UPDATE shihab_products SET image_url = 'https://images.unsplash.com/photo-1595225476474-87563907a212?w=800&q=80' WHERE id = 2");
$shihab_pdo->exec("UPDATE shihab_products SET image_url = 'https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=800&q=80' WHERE id = 3");
$shihab_pdo->exec("UPDATE shihab_products SET image_url = 'https://images.unsplash.com/photo-1615663245857-ac9310031881?w=800&q=80' WHERE id = 4");
echo "Images updated successfully.";
