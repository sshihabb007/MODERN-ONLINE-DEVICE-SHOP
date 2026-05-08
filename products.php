<?php include 'includes/mehedi_header.php'; ?>
<?php
// Initialize filter variables
$selected_categories = isset($_GET['category']) ? $_GET['category'] : [];
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
?>
<main class="pt-[100px] pb-margin px-margin max-w-container-max mx-auto flex flex-col md:flex-row gap-gutter flex-grow">
    <!-- Sidebar Filters -->
    <aside class="w-full md:w-64 flex-shrink-0">
        <form method="GET" action="products.php" class="glass-panel rounded-xl p-gutter sticky top-[100px] flex flex-col gap-stack-md">
            <div>
                <h3 class="font-h3 text-h3 text-primary mb-stack-sm border-b border-outline-variant/30 pb-2">Filters</h3>
            </div>

            <!-- Category -->
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">Category</h4>
                <div class="flex flex-col gap-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input name="category[]" value="mobile" type="checkbox" class="cyber-checkbox" <?php if(in_array('mobile', $selected_categories)) echo 'checked'; ?>/>
                        <span class="font-body-md text-body-md <?php echo in_array('mobile', $selected_categories) ? 'text-primary' : 'text-on-surface-variant'; ?> group-hover:text-primary transition-colors">Smartphones</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input name="category[]" value="laptop" type="checkbox" class="cyber-checkbox" <?php if(in_array('laptop', $selected_categories)) echo 'checked'; ?>/>
                        <span class="font-body-md text-body-md <?php echo in_array('laptop', $selected_categories) ? 'text-primary' : 'text-on-surface-variant'; ?> group-hover:text-primary transition-colors">Laptops</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input name="category[]" value="wearable" type="checkbox" class="cyber-checkbox" <?php if(in_array('wearable', $selected_categories)) echo 'checked'; ?>/>
                        <span class="font-body-md text-body-md <?php echo in_array('wearable', $selected_categories) ? 'text-primary' : 'text-on-surface-variant'; ?> group-hover:text-primary transition-colors">Wearables</span>
                    </label>
                </div>
            </div>

            <!-- Price Range -->
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">Price Range</h4>
                <div class="flex gap-2 items-center">
                    <input name="min_price" value="<?php echo htmlspecialchars($min_price); ?>" type="number" class="input-cyber w-full py-1 px-2 text-primary font-body-md text-body-md" placeholder="Min" />
                    <span class="text-on-surface-variant">-</span>
                    <input name="max_price" value="<?php echo htmlspecialchars($max_price); ?>" type="number" class="input-cyber w-full py-1 px-2 text-primary font-body-md text-body-md" placeholder="Max" />
                </div>
            </div>

            <!-- RAM (Stylized Radio Buttons) -->
            <div>
                <h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">RAM</h4>
                <div class="flex flex-wrap gap-2" id="ram-filters">
                    <!-- Note: RAM filter logic is UI only since it's not in the main table, but we will make it submittable -->
                    <label class="cursor-pointer">
                        <input type="radio" name="ram" value="8" class="hidden peer" <?php if(isset($_GET['ram']) && $_GET['ram'] == '8') echo 'checked'; ?>>
                        <span class="inline-block bg-surface-variant text-on-surface-variant border border-outline-variant px-3 py-1 rounded-full font-label-caps text-label-caps peer-checked:bg-secondary-container/20 peer-checked:text-secondary-fixed peer-checked:border-secondary-container hover:border-primary-fixed-dim transition-colors">8GB</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="ram" value="16" class="hidden peer" <?php if(isset($_GET['ram']) && $_GET['ram'] == '16') echo 'checked'; ?>>
                        <span class="inline-block bg-surface-variant text-on-surface-variant border border-outline-variant px-3 py-1 rounded-full font-label-caps text-label-caps peer-checked:bg-secondary-container/20 peer-checked:text-secondary-fixed peer-checked:border-secondary-container hover:border-primary-fixed-dim transition-colors">16GB</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="ram" value="32" class="hidden peer" <?php if(isset($_GET['ram']) && $_GET['ram'] == '32') echo 'checked'; ?>>
                        <span class="inline-block bg-surface-variant text-on-surface-variant border border-outline-variant px-3 py-1 rounded-full font-label-caps text-label-caps peer-checked:bg-secondary-container/20 peer-checked:text-secondary-fixed peer-checked:border-secondary-container hover:border-primary-fixed-dim transition-colors">32GB</span>
                    </label>
                </div>
            </div>

            <!-- Button -->
            <button type="submit" class="ghost-button font-button text-button text-primary-fixed-dim py-3 px-6 rounded-lg w-full mt-stack-sm hover:bg-primary-fixed-dim/20 transition-colors">
                Apply Filters
            </button>
            <?php if (!empty($_GET)): ?>
                <a href="products.php" class="text-center font-button text-button text-error py-2 px-6 rounded-lg w-full mt-2 hover:bg-error/20 transition-colors block">
                    Clear Filters
                </a>
            <?php endif; ?>
        </form>
    </aside>

    <!-- Product Grid -->
    <div class="flex-1">
        <?php include 'includes/shihab_db_connect.php'; ?>
        <?php
        global $shihab_pdo;

        // Build Query
        $query = "SELECT * FROM shihab_products WHERE 1=1";
        $params = [];

        // Apply Category Filter
        if (!empty($selected_categories)) {
            $inQuery = implode(',', array_fill(0, count($selected_categories), '?'));
            $query .= " AND category IN ($inQuery)";
            foreach ($selected_categories as $cat) {
                $params[] = $cat;
            }
        }

        // Apply Price Filter
        if (!empty($min_price) && is_numeric($min_price)) {
            $query .= " AND price >= ?";
            $params[] = $min_price;
        }
        if (!empty($max_price) && is_numeric($max_price)) {
            $query .= " AND price <= ?";
            $params[] = $max_price;
        }

        $sshihabb007_stmt = $shihab_pdo->prepare($query);
        $sshihabb007_stmt->execute($params);
        $products = $sshihabb007_stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <div class="flex justify-between items-center mb-stack-md">
            <h1 class="font-h2 text-h2 text-primary">Explore Devices</h1>
            <span class="font-body-md text-body-md text-on-surface-variant">Showing <?php echo count($products); ?> results</span>
        </div>

        <?php if (count($products) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
            <?php
            foreach ($products as $mehedi_row) {
                echo '<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">';
                
                echo '<div class="relative aspect-[3/4] bg-surface-container-lowest overflow-hidden">';
                echo '<img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="' . htmlspecialchars($mehedi_row['image_url']) . '" alt="' . htmlspecialchars($mehedi_row['name']) . '"/>';
                echo '<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div></div>';
                
                echo '<div class="p-stack-sm flex flex-col flex-1">';
                echo '<h3 class="font-h3 text-h3 text-primary mb-1">' . htmlspecialchars($mehedi_row['name']) . '</h3>';
                echo '<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">' . htmlspecialchars($mehedi_row['description']) . '</p>';
                
                echo '<div class="flex justify-between items-end mt-auto">';
                echo '<span class="font-h2 text-h2 text-primary-fixed-dim">$' . number_format($mehedi_row['price'], 2) . '</span>';
                
                // Add to cart form
                echo '<form method="POST" action="mehedi_cart_action.php">';
                echo '<input type="hidden" name="id" value="' . $mehedi_row['id'] . '">';
                echo '<button type="submit" name="add_to_cart" class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20"><span class="material-symbols-outlined">add_shopping_cart</span></button>';
                echo '</form>';
                
                echo '</div></div></div>';
            }
            ?>
            </div>
        <?php else: ?>
            <div class="glass-panel p-12 text-center rounded-xl flex flex-col items-center justify-center">
                <span class="material-symbols-outlined text-6xl text-outline mb-4">search_off</span>
                <h3 class="font-h3 text-h3 text-primary mb-2">No Artifacts Found</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Adjust your filters to discover more devices in the network.</p>
            </div>
        <?php endif; ?>

        <!-- Load More / Glitch Loader -->
        <?php if (count($products) > 0): ?>
        <div class="mt-stack-lg flex justify-center">
            <button class="ghost-button font-button text-button text-primary px-8 py-3 rounded-full flex items-center gap-2">
                <span class="material-symbols-outlined">autorenew</span>
                Load More Artifacts
            </button>
        </div>
        <?php endif; ?>
    </div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
