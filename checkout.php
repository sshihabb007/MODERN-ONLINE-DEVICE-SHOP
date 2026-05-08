<?php
include 'includes/mehedi_header.php';
include 'includes/shihab_db_connect.php';

global $shihab_pdo;

$shihab_subtotal = 0;
$shihab_tax_rate = 0.05;
$mehedi_cart_items = [];

if (isset($_SESSION['sshihabb007_cart']) && !empty($_SESSION['sshihabb007_cart'])) {
    foreach ($_SESSION['sshihabb007_cart'] as $shihab_product_id => $shihab_qty) {
        $sshihabb007_stmt = $shihab_pdo->prepare("SELECT * FROM shihab_products WHERE id = ?");
        $sshihabb007_stmt->execute([$shihab_product_id]);
        $mehedi_row = $sshihabb007_stmt->fetch(PDO::FETCH_ASSOC);

        if ($mehedi_row) {
            $mehedi_row['quantity'] = $shihab_qty;
            $mehedi_row['line_total'] = $mehedi_row['price'] * $shihab_qty;
            $shihab_subtotal += $mehedi_row['line_total'];
            $mehedi_cart_items[] = $mehedi_row;
        }
    }
}

$shihab_taxes = $shihab_subtotal * $shihab_tax_rate;
$shihab_total = $shihab_subtotal + $shihab_taxes;
?>
<main class="max-w-container-max mx-auto px-gutter pt-[100px] md:pt-[120px] pb-[100px] flex-grow">
    <!-- Page Header -->
    <div class="mb-stack-lg flex items-center justify-between">
        <div>
            <a href="products.php" class="inline-flex items-center gap-unit text-on-surface-variant hover:text-primary transition-colors text-button font-button mb-3">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                Continue Shopping
            </a>
            <h1 class="font-h1 text-h1 text-primary">Secure Checkout</h1>
        </div>
        <?php if (!empty($mehedi_cart_items)): ?>
        <form method="POST" action="mehedi_cart_action.php">
            <button type="submit" name="shihab_clear_cart"
                    class="text-error hover:text-on-surface-variant transition-colors font-button text-button flex items-center gap-unit border border-error/30 px-4 py-2 rounded-lg hover:border-outline-variant/50"
                    onclick="return confirm('Clear your entire cart?')">
                <span class="material-symbols-outlined text-[16px]">delete_sweep</span>
                Clear Cart
            </button>
        </form>
        <?php endif; ?>
    </div>

    <!-- Progress Stepper -->
    <div class="mb-stack-lg flex items-center justify-center">
        <div class="flex items-center space-x-4">
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center text-on-primary-fixed-variant font-label-caps shadow-[0_0_10px_rgba(0,221,221,0.5)]">1</div>
                <span class="font-label-caps text-primary-fixed-dim mt-2">CART</span>
            </div>
            <div class="h-[1px] w-16 bg-primary-fixed-dim/50"></div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full border border-primary-fixed-dim/50 bg-surface flex items-center justify-center text-on-surface-variant font-label-caps">2</div>
                <span class="font-label-caps text-on-surface-variant mt-2">SHIPPING</span>
            </div>
            <div class="h-[1px] w-16 bg-outline-variant/50"></div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full border border-outline-variant/50 bg-surface flex items-center justify-center text-on-surface-variant font-label-caps">3</div>
                <span class="font-label-caps text-on-surface-variant mt-2">PAYMENT</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <!-- Left Column: Cart Items -->
        <div class="lg:col-span-7 space-y-stack-md">
            <div class="glass-panel p-stack-md rounded-xl space-y-stack-md">
                <?php if (empty($mehedi_cart_items)): ?>
                    <div class="flex flex-col items-center justify-center py-16 text-center">
                        <span class="material-symbols-outlined text-6xl text-outline mb-4">shopping_cart</span>
                        <h3 class="font-h3 text-h3 text-primary mb-2">Your cart is empty</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6">Add some devices from the Explore grid.</p>
                        <a href="products.php" class="ghost-button py-3 px-6 rounded-lg font-button text-button text-primary-fixed-dim">
                            Explore Devices
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($mehedi_cart_items as $item): ?>
                    <div class="flex gap-stack-md items-start border-b border-outline-variant/20 pb-stack-md last:border-b-0 last:pb-0">
                        <!-- Product Image -->
                        <a href="product-details.php?id=<?php echo $item['id']; ?>" class="flex-shrink-0">
                            <div class="w-24 h-24 rounded-lg overflow-hidden relative">
                                <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent z-10"></div>
                                <img alt="<?php echo htmlspecialchars($item['name']); ?>"
                                     class="w-full h-full object-cover"
                                     src="<?php echo htmlspecialchars($item['image_url']); ?>"/>
                            </div>
                        </a>

                        <!-- Product Info -->
                        <div class="flex-1 min-w-0">
                            <a href="product-details.php?id=<?php echo $item['id']; ?>">
                                <h3 class="font-h3 text-h3 text-primary hover:text-primary-fixed-dim transition-colors"><?php echo htmlspecialchars($item['name']); ?></h3>
                            </a>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-unit capitalize"><?php echo htmlspecialchars($item['category']); ?></p>
                            <p class="font-body-md text-body-md text-primary-fixed-dim mt-1">$<?php echo number_format($item['price'], 2); ?> each</p>

                            <!-- Quantity Controls -->
                            <form method="POST" action="mehedi_cart_action.php" class="flex items-center gap-2 mt-2">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <div class="flex items-center bg-surface-container/80 rounded-full border border-outline-variant/30 overflow-hidden">
                                    <button type="submit" name="sshihabb007_update_qty"
                                            onclick="this.previousElementSibling.value=Math.max(0,parseInt(document.getElementById('qty-<?php echo $item['id']; ?>').value)-1)"
                                            class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors text-lg leading-none">−</button>
                                    <input type="number" name="qty" id="qty-<?php echo $item['id']; ?>"
                                           value="<?php echo $item['quantity']; ?>" min="0" max="99"
                                           class="w-10 h-8 bg-transparent border-none text-center font-button text-button text-primary focus:ring-0 text-sm"/>
                                    <button type="submit" name="sshihabb007_update_qty"
                                            onclick="document.getElementById('qty-<?php echo $item['id']; ?>').value=parseInt(document.getElementById('qty-<?php echo $item['id']; ?>').value)+1"
                                            class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors text-lg leading-none">+</button>
                                </div>
                                <button type="submit" name="sshihabb007_update_qty"
                                        class="font-label-caps text-label-caps text-primary-fixed-dim hover:text-primary transition-colors px-2 py-1 rounded border border-primary-fixed-dim/30 hover:border-primary-fixed-dim text-[10px]">
                                    Update
                                </button>
                            </form>
                        </div>

                        <!-- Price + Remove -->
                        <div class="text-right flex-shrink-0 flex flex-col items-end gap-2">
                            <div class="font-h3 text-h3 text-primary-fixed-dim">$<?php echo number_format($item['line_total'], 2); ?></div>
                            <form method="POST" action="mehedi_cart_action.php">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" name="mehedi_remove_item"
                                        class="text-outline hover:text-error transition-colors p-1 flex items-center gap-1 font-label-caps text-label-caps text-[10px]">
                                    <span class="material-symbols-outlined text-[14px]">delete</span> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Column: Shipping & Summary -->
        <div class="lg:col-span-5 space-y-stack-md">
            <!-- Shipping Form -->
            <div class="glass-modal p-stack-md rounded-xl">
                <h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-unit">
                    <span class="material-symbols-outlined text-primary-fixed-dim">local_shipping</span>
                    Shipping Information
                </h2>
                <form class="space-y-stack-sm">
                    <div class="grid grid-cols-2 gap-stack-sm">
                        <div>
                            <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">First Name</label>
                            <input class="cyber-input w-full p-2 text-primary font-body-md" placeholder="Cipher" type="text"/>
                        </div>
                        <div>
                            <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Last Name</label>
                            <input class="cyber-input w-full p-2 text-primary font-body-md" placeholder="Protocol" type="text"/>
                        </div>
                    </div>
                    <div>
                        <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Email Address</label>
                        <input class="cyber-input w-full p-2 text-primary font-body-md" placeholder="cipher@neon-axiom.net" type="email"/>
                    </div>
                    <div>
                        <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Delivery Address</label>
                        <input class="cyber-input w-full p-2 text-primary font-body-md" placeholder="101 Sector Grid" type="text"/>
                    </div>
                    <div class="pt-stack-sm flex items-center gap-unit">
                        <input class="cyber-checkbox" id="save-info" type="checkbox"/>
                        <label class="font-body-md text-body-md text-on-surface-variant cursor-pointer" for="save-info">Save this profile to my digital vault</label>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="glass-panel p-stack-md rounded-xl">
                <h2 class="font-h3 text-h3 text-primary mb-stack-md">Order Summary</h2>
                <div class="space-y-stack-sm border-b border-outline-variant/30 pb-stack-sm">
                    <div class="flex justify-between">
                        <span class="font-body-md text-body-md text-on-surface-variant">
                            Subtotal (<?php echo array_sum(array_column($mehedi_cart_items, 'quantity')); ?> items)
                        </span>
                        <span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_subtotal, 2); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-body-md text-body-md text-on-surface-variant">Encrypted Shipping</span>
                        <span class="font-body-md text-body-md text-primary-fixed-dim">Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-body-md text-body-md text-on-surface-variant">Taxes (Est. 5%)</span>
                        <span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_taxes, 2); ?></span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-stack-md">
                    <span class="font-h3 text-h3 text-primary">Total</span>
                    <span class="font-h2 text-h2 text-primary-fixed-dim tracking-tight">$<?php echo number_format($shihab_total, 2); ?></span>
                </div>
                <?php if (!empty($mehedi_cart_items)): ?>
                <button class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase tracking-wider flex items-center justify-center gap-unit">
                    Proceed to Payment
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
                <?php else: ?>
                <a href="products.php" class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase tracking-wider flex items-center justify-center gap-unit">
                    Start Shopping
                    <span class="material-symbols-outlined">shopping_bag</span>
                </a>
                <?php endif; ?>
                <div class="mt-stack-sm text-center flex items-center justify-center gap-unit opacity-70">
                    <span class="material-symbols-outlined text-[16px]">lock</span>
                    <span class="font-label-caps text-label-caps text-on-surface-variant">AES-256 Bit Encryption</span>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
