<?php include 'includes/mehedi_header.php'; ?>
<main class="pt-[100px] pb-margin px-margin max-w-container-max mx-auto flex flex-col md:flex-row gap-gutter flex-grow">
<!-- Sidebar Filters -->
<aside class="w-full md:w-64 flex-shrink-0">
<div class="glass-panel rounded-xl p-gutter sticky top-[100px] flex flex-col gap-stack-md">
<div>
<h3 class="font-h3 text-h3 text-primary mb-stack-sm border-b border-outline-variant/30 pb-2">Filters</h3>
</div>
<!-- Category -->
<div>
<h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">Category</h4>
<div class="flex flex-col gap-2">
<label class="flex items-center gap-2 cursor-pointer group">
<input checked="" class="cyber-checkbox" type="checkbox"/>
<span class="font-body-md text-body-md group-hover:text-primary transition-colors">Smartphones</span>
</label>
<label class="flex items-center gap-2 cursor-pointer group">
<input class="cyber-checkbox" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Laptops</span>
</label>
<label class="flex items-center gap-2 cursor-pointer group">
<input class="cyber-checkbox" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Wearables</span>
</label>
</div>
</div>
<!-- Price Range -->
<div>
<h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">Price Range</h4>
<div class="flex gap-2 items-center">
<input class="input-cyber w-full py-1 px-2 text-primary font-body-md text-body-md" placeholder="Min" type="text"/>
<span class="text-on-surface-variant">-</span>
<input class="input-cyber w-full py-1 px-2 text-primary font-body-md text-body-md" placeholder="Max" type="text"/>
</div>
</div>
<!-- RAM -->
<div>
<h4 class="font-label-caps text-label-caps text-on-surface-variant mb-unit">RAM</h4>
<div class="flex flex-wrap gap-2">
<button class="bg-secondary-container/20 text-secondary-fixed border border-secondary-container px-3 py-1 rounded-full font-label-caps text-label-caps hover:bg-secondary-container/40 transition-colors">8GB</button>
<button class="bg-surface-variant text-on-surface-variant border border-outline-variant px-3 py-1 rounded-full font-label-caps text-label-caps hover:border-primary-fixed-dim transition-colors">16GB</button>
<button class="bg-surface-variant text-on-surface-variant border border-outline-variant px-3 py-1 rounded-full font-label-caps text-label-caps hover:border-primary-fixed-dim transition-colors">32GB</button>
</div>
</div>
<!-- Button -->
<button class="ghost-button font-button text-button text-primary-fixed-dim py-3 px-6 rounded-lg w-full mt-stack-sm">
                    Apply Filters
                </button>
</div>
</aside>
<!-- Product Grid -->
<div class="flex-1">
<div class="flex justify-between items-center mb-stack-md">
<h1 class="font-h2 text-h2 text-primary">Explore Devices</h1>
<span class="font-body-md text-body-md text-on-surface-variant">Showing 12 results</span>
</div>
<?php include 'includes/shihab_db_connect.php'; ?>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
<?php
    global $shihab_pdo;
    $sshihabb007_stmt = $shihab_pdo->query("SELECT * FROM shihab_products");
    while ($mehedi_row = $sshihabb007_stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">';
        echo '<div class="relative aspect-[3/4] bg-surface-container-lowest overflow-hidden">';
        echo '<img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="' . htmlspecialchars($mehedi_row['image_url']) . '"/>';
        echo '<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div></div>';
        echo '<div class="p-stack-sm flex flex-col flex-1">';
        echo '<h3 class="font-h3 text-h3 text-primary mb-1">' . htmlspecialchars($mehedi_row['name']) . '</h3>';
        echo '<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">' . htmlspecialchars($mehedi_row['description']) . '</p>';
        echo '<div class="flex justify-between items-end mt-auto">';
        echo '<span class="font-h2 text-h2 text-primary-fixed-dim">$' . number_format($mehedi_row['price'], 2) . '</span>';
        echo '<form method="POST" action="mehedi_cart_action.php"><input type="hidden" name="id" value="' . $mehedi_row['id'] . '"><button type="submit" name="add_to_cart" class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20"><span class="material-symbols-outlined">add_shopping_cart</span></button></form>';
        echo '</div></div></div>';
    }
?>
</div>
<!-- Load More / Glitch Loader -->
<div class="mt-stack-lg flex justify-center">
<button class="ghost-button font-button text-button text-primary px-8 py-3 rounded-full flex items-center gap-2">
<span class="material-symbols-outlined">autorenew</span>
                    Load More Artifacts
                </button>
</div>
</div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
