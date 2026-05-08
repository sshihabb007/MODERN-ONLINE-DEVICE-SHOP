<?php
include '../includes/mehedi_header.php';
include '../includes/shihab_db_connect.php';

global $shihab_pdo;

// Get product by ID or slug
$sshihabb007_product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$mehedi_slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if ($sshihabb007_product_id > 0) {
    $sshihabb007_stmt = $shihab_pdo->prepare("SELECT * FROM shihab_products WHERE id = ?");
    $sshihabb007_stmt->execute([$sshihabb007_product_id]);
} elseif (!empty($mehedi_slug)) {
    $sshihabb007_stmt = $shihab_pdo->prepare("SELECT * FROM shihab_products WHERE slug = ?");
    $sshihabb007_stmt->execute([$mehedi_slug]);
} else {
    header("Location: ../pages/products.php");
    exit();
}

$shihab_product = $sshihabb007_stmt->fetch(PDO::FETCH_ASSOC);
if (!$shihab_product) {
    header("Location: ../pages/products.php");
    exit();
}

// Fetch related products (same category)
$mehedi_related_stmt = $shihab_pdo->prepare("SELECT * FROM shihab_products WHERE category = ? AND id != ? LIMIT 3");
$mehedi_related_stmt->execute([$shihab_product['category'], $shihab_product['id']]);
$sshihabb007_related = $mehedi_related_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="max-w-container-max mx-auto px-gutter pt-12 pb-margin min-h-screen flex-grow">
    <!-- Breadcrumb / Back Action -->
    <nav class="mb-stack-md">
        <a class="inline-flex items-center gap-unit text-on-surface-variant hover:text-primary transition-colors text-button font-button" href="products.php">
            <span class="material-symbols-outlined text-[16px]">arrow_back</span>
            Back to Explore
        </a>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-stack-lg items-start">
        <!-- Left Column: Image Gallery -->
        <div class="lg:col-span-7 flex flex-col gap-stack-sm">
            <div class="relative w-full aspect-video rounded-xl overflow-hidden glass-panel flex items-center justify-center p-stack-md group">
                <div class="absolute inset-0 bg-gradient-to-t from-surface-dim to-transparent opacity-50 z-10 pointer-events-none"></div>
                <img id="shihab-main-image"
                     alt="<?php echo htmlspecialchars($shihab_product['name']); ?>"
                     class="w-full h-full object-cover rounded-lg relative z-0 transform transition-transform duration-700 group-hover:scale-105"
                     src="<?php echo htmlspecialchars($shihab_product['image_url']); ?>"/>
                <!-- Badge -->
                <?php if ($shihab_product['is_featured']): ?>
                <div class="absolute top-stack-sm right-stack-sm z-20 bg-secondary-container/20 text-secondary border border-secondary px-stack-sm py-[2px] rounded-full font-label-caps text-label-caps">
                    ⭐ FEATURED
                </div>
                <?php endif; ?>
                <!-- Stock badge -->
                <?php if ($shihab_product['stock'] <= 10 && $shihab_product['stock'] > 0): ?>
                <div class="absolute top-stack-sm left-stack-sm z-20 bg-error/20 text-error border border-error/50 px-stack-sm py-[2px] rounded-full font-label-caps text-label-caps">
                    Only <?php echo $shihab_product['stock']; ?> left!
                </div>
                <?php endif; ?>
            </div>
            <!-- Thumbnail Row - show extra image views -->
            <div class="grid grid-cols-4 gap-stack-sm">
                <button onclick="document.getElementById('shihab-main-image').src='<?php echo htmlspecialchars($shihab_product['image_url']); ?>'" 
                        class="relative aspect-square rounded-lg overflow-hidden glass-panel border border-primary-fixed-dim/50 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-fixed-dim">
                    <img alt="View 1" class="w-full h-full object-cover opacity-80 hover:opacity-100 transition-opacity"
                         src="<?php echo htmlspecialchars($shihab_product['image_url']); ?>"/>
                </button>
                <button class="relative aspect-square rounded-lg overflow-hidden glass-panel border-transparent hover:border-outline-variant/50 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-fixed-dim">
                    <div class="w-full h-full bg-surface-container-high/50 flex flex-col items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-outline text-[24px]">photo_camera</span>
                        <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">Camera</span>
                    </div>
                </button>
                <button class="relative aspect-square rounded-lg overflow-hidden glass-panel border-transparent hover:border-outline-variant/50 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-fixed-dim">
                    <div class="w-full h-full bg-surface-container-high/50 flex flex-col items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-outline text-[24px]">memory</span>
                        <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">Specs</span>
                    </div>
                </button>
                <button class="relative aspect-square rounded-lg overflow-hidden glass-panel border-transparent hover:border-outline-variant/50 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary-fixed-dim">
                    <div class="w-full h-full bg-surface-container-high/50 flex flex-col items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-outline text-[24px]">360</span>
                        <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">360°</span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Right Column: Product Details -->
        <div class="lg:col-span-5 flex flex-col gap-stack-md sticky top-[120px]">
            <!-- Category Tag -->
            <div>
                <span class="inline-block bg-primary-fixed-dim/10 text-primary-fixed-dim border border-primary-fixed-dim/30 px-3 py-1 rounded-full font-label-caps text-label-caps uppercase mb-3">
                    <?php echo htmlspecialchars($shihab_product['category']); ?>
                </span>
            </div>

            <!-- Product Header -->
            <div>
                <h1 class="font-h1 text-h1 text-primary mb-unit"><?php echo htmlspecialchars($shihab_product['name']); ?></h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-sm">
                    <?php echo htmlspecialchars($shihab_product['description']); ?>
                </p>
                <div class="text-[40px] font-bold text-primary-fixed-dim tracking-tight">
                    $<?php echo number_format($shihab_product['price'], 2); ?>
                </div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mt-1">
                    <?php if ($shihab_product['stock'] > 0): ?>
                        <span class="text-green-400">● In Stock</span> — <?php echo $shihab_product['stock']; ?> units available
                    <?php else: ?>
                        <span class="text-error">● Out of Stock</span>
                    <?php endif; ?>
                </p>
            </div>

            <!-- Refractive Divider -->
            <div class="h-px w-full bg-gradient-to-r from-transparent via-primary-fixed-dim/50 to-transparent"></div>

            <!-- Specs -->
            <div class="glass-panel rounded-xl p-stack-md flex flex-col gap-stack-sm">
                <h3 class="font-h3 text-h3 text-primary flex items-center gap-unit">
                    <span class="material-symbols-outlined text-primary-fixed-dim">memory</span>
                    Technical Architecture
                </h3>
                <div class="grid grid-cols-1 gap-0 mt-stack-sm">
                    <div class="flex justify-between items-center py-3 border-b border-outline-variant/20">
                        <span class="font-body-md text-body-md text-on-surface-variant">Category</span>
                        <span class="font-button text-button text-primary capitalize"><?php echo htmlspecialchars($shihab_product['category']); ?></span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-outline-variant/20">
                        <span class="font-body-md text-body-md text-on-surface-variant">Stock Units</span>
                        <span class="font-button text-button text-primary"><?php echo $shihab_product['stock']; ?> pcs</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-outline-variant/20">
                        <span class="font-body-md text-body-md text-on-surface-variant">Status</span>
                        <span class="font-button text-button text-primary">
                            <?php echo $shihab_product['is_featured'] ? '⭐ Featured' : 'Standard'; ?>
                        </span>
                    </div>
                    <div class="flex justify-between items-center py-3">
                        <span class="font-body-md text-body-md text-on-surface-variant">Unit Price</span>
                        <span class="font-button text-button text-primary-fixed-dim">$<?php echo number_format($shihab_product['price'], 2); ?></span>
                    </div>
                </div>
            </div>

            <!-- Add to Cart / Actions -->
            <div class="flex flex-col gap-stack-sm mt-stack-sm">
                <?php if ($shihab_product['stock'] > 0): ?>
                <form method="POST" action="../actions/mehedi_cart_action.php">
                    <input type="hidden" name="id" value="<?php echo $shihab_product['id']; ?>">
                    <button type="submit" name="add_to_cart"
                            class="w-full py-stack-sm px-gutter rounded-xl font-button text-button tracking-widest uppercase btn-ghost-glass flex items-center justify-center gap-unit hover:scale-[1.02] transition-all">
                        <span class="material-symbols-outlined">add_shopping_cart</span>
                        Add to Cart
                    </button>
                </form>
                <?php else: ?>
                <button disabled class="w-full py-stack-sm px-gutter rounded-xl font-button text-button tracking-widest uppercase bg-surface-container text-on-surface-variant cursor-not-allowed flex items-center justify-center gap-unit">
                    <span class="material-symbols-outlined">remove_shopping_cart</span>
                    Out of Stock
                </button>
                <?php endif; ?>

                <a href="checkout.php" class="w-full py-stack-sm px-gutter rounded-xl font-button text-button tracking-widest uppercase bg-transparent text-on-surface-variant border border-outline-variant/30 hover:bg-surface-container-high hover:text-primary transition-colors flex items-center justify-center gap-unit">
                    <span class="material-symbols-outlined">shopping_cart_checkout</span>
                    View Cart
                </a>
            </div>

            <!-- Trust Badges -->
            <div class="grid grid-cols-3 gap-3 mt-2">
                <div class="glass-panel rounded-lg p-3 flex flex-col items-center gap-1 text-center">
                    <span class="material-symbols-outlined text-primary-fixed-dim">local_shipping</span>
                    <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">Free Shipping</span>
                </div>
                <div class="glass-panel rounded-lg p-3 flex flex-col items-center gap-1 text-center">
                    <span class="material-symbols-outlined text-primary-fixed-dim">verified_user</span>
                    <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">2yr Warranty</span>
                </div>
                <div class="glass-panel rounded-lg p-3 flex flex-col items-center gap-1 text-center">
                    <span class="material-symbols-outlined text-primary-fixed-dim">assignment_return</span>
                    <span class="font-label-caps text-label-caps text-on-surface-variant text-[9px]">30-Day Returns</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <?php if (!empty($sshihabb007_related)): ?>
    <section class="mt-16">
        <h2 class="font-h2 text-h2 text-primary mb-stack-md">Related Devices</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
            <?php foreach ($sshihabb007_related as $mehedi_rel): ?>
            <a href="product-details.php?id=<?php echo $mehedi_rel['id']; ?>" 
               class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full hover:scale-[1.02] transition-all duration-300">
                <div class="relative aspect-[3/4] bg-surface-container-lowest overflow-hidden">
                    <img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105"
                         src="<?php echo htmlspecialchars($mehedi_rel['image_url']); ?>"
                         alt="<?php echo htmlspecialchars($mehedi_rel['name']); ?>"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
                </div>
                <div class="p-stack-sm flex flex-col flex-1">
                    <h3 class="font-h3 text-h3 text-primary mb-1"><?php echo htmlspecialchars($mehedi_rel['name']); ?></h3>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">
                        <?php echo htmlspecialchars($mehedi_rel['description']); ?>
                    </p>
                    <div class="flex justify-between items-end mt-auto">
                        <span class="font-h2 text-h2 text-primary-fixed-dim">$<?php echo number_format($mehedi_rel['price'], 2); ?></span>
                        <span class="text-primary-fixed-dim bg-primary-fixed-dim/10 rounded-full p-2 border border-primary-fixed-dim/30 text-sm group-hover:bg-primary-fixed-dim/30 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
</main>
<?php include '../includes/sshihabb007_footer.php'; ?>
