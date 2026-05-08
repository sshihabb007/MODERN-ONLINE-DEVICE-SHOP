<?php
require 'includes/shihab_db_connect.php';
global $shihab_pdo;

// First clear existing products (handle FK constraints)
$shihab_pdo->exec("SET FOREIGN_KEY_CHECKS=0");
$shihab_pdo->exec("TRUNCATE TABLE shihab_products");
$shihab_pdo->exec("SET FOREIGN_KEY_CHECKS=1");

$products = [
    [
        'name' => 'Google Pixel 9 Pro',
        'slug' => 'google-pixel-9-pro',
        'description' => 'Flagship smartphone with advanced AI photography, Tensor G4 chip, and a brilliant OLED display. Experience computing reimagined.',
        'price' => 1199.00,
        'category' => 'mobile',
        'stock' => 50,
        'image_url' => 'https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp',
        'is_featured' => 1
    ],
    [
        'name' => 'Samsung Galaxy S25 Ultra',
        'slug' => 'samsung-galaxy-s25-ultra',
        'description' => 'The pinnacle of Android technology with S Pen, 200MP camera system, and Galaxy AI that transforms your workflow.',
        'price' => 1399.00,
        'category' => 'mobile',
        'stock' => 35,
        'image_url' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=800&q=80',
        'is_featured' => 1
    ],
    [
        'name' => 'iPhone 16 Pro Max',
        'slug' => 'iphone-16-pro-max',
        'description' => 'Apple\'s most powerful iPhone with A18 Pro chip, titanium design, 5x telephoto zoom, and Action Button customization.',
        'price' => 1299.00,
        'category' => 'mobile',
        'stock' => 60,
        'image_url' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=800&q=80',
        'is_featured' => 1
    ],
    [
        'name' => 'OnePlus 12 Pro',
        'slug' => 'oneplus-12-pro',
        'description' => 'Blazing-fast flagship with Snapdragon 8 Gen 3, 100W SuperVOOC charging, and Hasselblad tuned cameras.',
        'price' => 899.00,
        'category' => 'mobile',
        'stock' => 40,
        'image_url' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&q=80',
        'is_featured' => 0
    ],
    [
        'name' => 'MacBook Pro 16" M4 Max',
        'slug' => 'macbook-pro-16-m4-max',
        'description' => 'Unrivaled performance with M4 Max chip, Liquid Retina XDR display, and up to 22 hours battery life for professionals.',
        'price' => 2499.00,
        'category' => 'laptop',
        'stock' => 25,
        'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=800&q=80',
        'is_featured' => 1
    ],
    [
        'name' => 'ASUS ROG Zephyrus G16',
        'slug' => 'asus-rog-zephyrus-g16',
        'description' => 'Elite gaming laptop with RTX 4090, Intel i9, 240Hz QHD OLED display and MUX Switch for maximum frame rates.',
        'price' => 2199.00,
        'category' => 'laptop',
        'stock' => 20,
        'image_url' => 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=800&q=80',
        'is_featured' => 0
    ],
    [
        'name' => 'Dell XPS 15 OLED',
        'slug' => 'dell-xps-15-oled',
        'description' => 'Premium ultrabook with 15.6" 3.5K OLED display, Intel Core Ultra 9, and InfinityEdge design for creators.',
        'price' => 1799.00,
        'category' => 'laptop',
        'stock' => 30,
        'image_url' => 'https://images.unsplash.com/photo-1593642634367-d91a135587b5?w=800&q=80',
        'is_featured' => 0
    ],
    [
        'name' => 'Lenovo ThinkPad X1 Carbon',
        'slug' => 'lenovo-thinkpad-x1-carbon',
        'description' => 'Ultra-lightweight business powerhouse with MIL-SPEC durability, Intel vPro, and best-in-class keyboard.',
        'price' => 1599.00,
        'category' => 'laptop',
        'stock' => 45,
        'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&q=80',
        'is_featured' => 0
    ],
];

$mehedi_sql = "INSERT INTO shihab_products (name, slug, description, price, category, stock, image_url, is_featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$sshihabb007_stmt = $shihab_pdo->prepare($mehedi_sql);

foreach ($products as $p) {
    $sshihabb007_stmt->execute([
        $p['name'], $p['slug'], $p['description'], $p['price'],
        $p['category'], $p['stock'], $p['image_url'], $p['is_featured']
    ]);
}

echo "<h2 style='font-family:monospace;color:lime;background:#000;padding:20px;'>✅ " . count($products) . " products seeded successfully!</h2>";
echo "<p style='font-family:monospace;color:cyan;background:#000;padding:20px;'><a style='color:cyan' href='products.php'>→ Go to Explore Page</a></p>";
?>
