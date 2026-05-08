<?php
include 'includes/mehedi_header.php';
include 'includes/shihab_db_connect.php';

global $shihab_pdo;

// ---- Handle COD Order Placement ----
$shihab_order_success = false;
$shihab_order_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sshihabb007_place_order'])) {
    $mehedi_first_name = trim($_POST['first_name'] ?? '');
    $mehedi_last_name  = trim($_POST['last_name'] ?? '');
    $shihab_email      = trim($_POST['email'] ?? '');
    $shihab_address    = trim($_POST['address'] ?? '');

    if (empty($mehedi_first_name) || empty($mehedi_last_name) || empty($shihab_email) || empty($shihab_address)) {
        $shihab_order_error = 'Please fill in all shipping fields before placing your order.';
    } elseif (empty($_SESSION['sshihabb007_cart'])) {
        $shihab_order_error = 'Your cart is empty.';
    } else {
        // Clear cart after successful COD placement
        $_SESSION['sshihabb007_cart'] = [];
        $shihab_order_success = true;
    }
}

// ---- Build cart data ----
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

    <?php if ($shihab_order_success): ?>
    <!-- ========== ORDER SUCCESS STATE ========== -->
    <div class="flex flex-col items-center justify-center py-20 text-center">
        <div class="glass-panel rounded-2xl p-12 max-w-lg w-full relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-fixed-dim/5 to-secondary-container/10 pointer-events-none"></div>
            <div class="w-20 h-20 rounded-full bg-primary-fixed-dim/10 border-2 border-primary-fixed-dim flex items-center justify-center mx-auto mb-6 shadow-[0_0_30px_rgba(0,221,221,0.3)]">
                <span class="material-symbols-outlined text-primary-fixed-dim text-4xl">check_circle</span>
            </div>
            <h1 class="font-h1 text-h1 text-primary mb-3">Order Confirmed!</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-2">
                Your Cash on Delivery order has been placed successfully.
            </p>
            <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                Our courier will contact you before delivery. Have your payment ready! 💸
            </p>
            <!-- COD Badge -->
            <div class="inline-flex items-center gap-2 bg-secondary-container/20 text-secondary-fixed border border-secondary-fixed/30 px-4 py-2 rounded-full mb-8 font-label-caps text-label-caps">
                <span class="material-symbols-outlined text-[18px]">payments</span>
                Cash On Delivery
            </div>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="products.php" class="ghost-button py-3 px-6 rounded-lg font-button text-button text-primary-fixed-dim flex items-center justify-center gap-unit">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    Continue Shopping
                </a>
                <a href="index.php" class="py-3 px-6 rounded-lg font-button text-button text-on-surface-variant border border-outline-variant/30 hover:bg-surface-container hover:text-primary transition-colors flex items-center justify-center gap-unit">
                    <span class="material-symbols-outlined">home</span>
                    Go Home
                </a>
            </div>
        </div>
    </div>

    <?php else: ?>
    <!-- ========== CHECKOUT STATE ========== -->

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
                <div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center font-label-caps shadow-[0_0_10px_rgba(0,221,221,0.5)] text-black">1</div>
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

    <!-- Error Alert -->
    <?php if (!empty($shihab_order_error)): ?>
    <div class="mb-6 flex items-center gap-3 bg-error/10 border border-error/30 text-error px-5 py-4 rounded-xl font-body-md">
        <span class="material-symbols-outlined">error</span>
        <?php echo htmlspecialchars($shihab_order_error); ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="checkout.php">
        <input type="hidden" name="sshihabb007_place_order" value="1">
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
                            <a href="product-details.php?id=<?php echo $item['id']; ?>" class="flex-shrink-0">
                                <div class="w-24 h-24 rounded-lg overflow-hidden relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent z-10"></div>
                                    <img alt="<?php echo htmlspecialchars($item['name']); ?>"
                                         class="w-full h-full object-cover"
                                         src="<?php echo htmlspecialchars($item['image_url']); ?>"/>
                                </div>
                            </a>
                            <div class="flex-1 min-w-0">
                                <a href="product-details.php?id=<?php echo $item['id']; ?>">
                                    <h3 class="font-h3 text-h3 text-primary hover:text-primary-fixed-dim transition-colors"><?php echo htmlspecialchars($item['name']); ?></h3>
                                </a>
                                <p class="font-body-md text-body-md text-on-surface-variant mt-unit capitalize"><?php echo htmlspecialchars($item['category']); ?></p>
                                <p class="font-body-md text-body-md text-primary-fixed-dim mt-1">$<?php echo number_format($item['price'], 2); ?> each</p>
                                <!-- Qty controls (separate mini-form) -->
                                <div class="flex items-center gap-2 mt-2">
                                    <form method="POST" action="mehedi_cart_action.php" class="flex items-center gap-2">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <div class="flex items-center bg-surface-container/80 rounded-full border border-outline-variant/30 overflow-hidden">
                                            <button type="submit" name="sshihabb007_update_qty"
                                                    formaction="mehedi_cart_action.php"
                                                    onclick="var f=document.getElementById('qty-<?php echo $item['id']; ?>');f.value=Math.max(0,parseInt(f.value)-1)"
                                                    class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors text-lg leading-none">−</button>
                                            <input type="number" name="qty" id="qty-<?php echo $item['id']; ?>"
                                                   value="<?php echo $item['quantity']; ?>" min="0" max="99"
                                                   class="w-10 h-8 bg-transparent border-none text-center font-button text-button text-primary focus:ring-0 text-sm"/>
                                            <button type="submit" name="sshihabb007_update_qty"
                                                    formaction="mehedi_cart_action.php"
                                                    onclick="var f=document.getElementById('qty-<?php echo $item['id']; ?>');f.value=parseInt(f.value)+1"
                                                    class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors text-lg leading-none">+</button>
                                        </div>
                                        <button type="submit" name="sshihabb007_update_qty"
                                                class="font-label-caps text-label-caps text-primary-fixed-dim hover:text-primary transition-colors px-2 py-1 rounded border border-primary-fixed-dim/30 hover:border-primary-fixed-dim text-[10px]">
                                            Update
                                        </button>
                                    </form>
                                </div>
                            </div>
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

                <!-- Shipping Information (inside main form) -->
                <?php if (!empty($mehedi_cart_items)): ?>
                <div class="glass-modal p-stack-md rounded-xl">
                    <h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-unit">
                        <span class="material-symbols-outlined text-primary-fixed-dim">local_shipping</span>
                        Delivery Information
                    </h2>
                    <div class="space-y-stack-sm">
                        <div class="grid grid-cols-2 gap-stack-sm">
                            <div>
                                <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">First Name *</label>
                                <input name="first_name" class="cyber-input w-full p-2 text-primary font-body-md" placeholder="Cipher" type="text" required/>
                            </div>
                            <div>
                                <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Last Name *</label>
                                <input name="last_name" class="cyber-input w-full p-2 text-primary font-body-md" placeholder="Protocol" type="text" required/>
                            </div>
                        </div>
                        <div>
                            <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Email Address *</label>
                            <input name="email" class="cyber-input w-full p-2 text-primary font-body-md" placeholder="cipher@neon-axiom.net" type="email" required/>
                        </div>
                        <div>
                            <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Delivery Address *</label>
                            <input name="address" class="cyber-input w-full p-2 text-primary font-body-md" placeholder="101 Sector Grid, Dhaka" type="text" required/>
                        </div>
                        <div>
                            <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Phone Number</label>
                            <input name="phone" class="cyber-input w-full p-2 text-primary font-body-md" placeholder="+880 1XXX-XXXXXX" type="tel"/>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Right Column: Order Summary -->
            <div class="lg:col-span-5 space-y-stack-md">
                <div class="glass-panel p-stack-md rounded-xl sticky top-[120px]">
                    <h2 class="font-h3 text-h3 text-primary mb-stack-md">Order Summary</h2>

                    <!-- Item summary list -->
                    <?php if (!empty($mehedi_cart_items)): ?>
                    <div class="space-y-2 mb-4">
                        <?php foreach ($mehedi_cart_items as $item): ?>
                        <div class="flex justify-between text-sm">
                            <span class="text-on-surface-variant truncate pr-2"><?php echo htmlspecialchars($item['name']); ?> ×<?php echo $item['quantity']; ?></span>
                            <span class="text-primary flex-shrink-0">$<?php echo number_format($item['line_total'], 2); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="space-y-stack-sm border-t border-outline-variant/30 pt-stack-sm">
                        <div class="flex justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Subtotal (<?php echo array_sum(array_column($mehedi_cart_items, 'quantity')); ?> items)</span>
                            <span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_subtotal, 2); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Shipping</span>
                            <span class="font-body-md text-body-md text-primary-fixed-dim">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Taxes (Est. 5%)</span>
                            <span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_taxes, 2); ?></span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center py-stack-md border-t border-outline-variant/30">
                        <span class="font-h3 text-h3 text-primary">Total</span>
                        <span class="font-h2 text-h2 text-primary-fixed-dim tracking-tight">$<?php echo number_format($shihab_total, 2); ?></span>
                    </div>

                    <!-- COD Payment Method Badge -->
                    <?php if (!empty($mehedi_cart_items)): ?>
                    <div class="flex items-center gap-3 bg-secondary-container/10 border border-secondary-fixed/20 rounded-xl p-4 mb-4">
                        <span class="material-symbols-outlined text-secondary-fixed text-2xl">payments</span>
                        <div>
                            <p class="font-button text-button text-primary">Cash on Delivery</p>
                            <p class="font-label-caps text-label-caps text-on-surface-variant">Pay when your order arrives</p>
                        </div>
                        <span class="ml-auto w-5 h-5 rounded-full bg-primary-fixed-dim flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-black text-[12px]">check</span>
                        </span>
                    </div>

                    <button type="submit"
                            class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase tracking-wider flex items-center justify-center gap-unit hover:scale-[1.02] transition-all">
                        <span class="material-symbols-outlined">shopping_cart_checkout</span>
                        Place Order — Cash on Delivery
                    </button>
                    <?php else: ?>
                    <a href="products.php" class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase tracking-wider flex items-center justify-center gap-unit">
                        Start Shopping
                        <span class="material-symbols-outlined">shopping_bag</span>
                    </a>
                    <?php endif; ?>

                    <div class="mt-stack-sm text-center flex items-center justify-center gap-unit opacity-70">
                        <span class="material-symbols-outlined text-[16px]">lock</span>
                        <span class="font-label-caps text-label-caps text-on-surface-variant">Secured & Encrypted</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endif; ?>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
