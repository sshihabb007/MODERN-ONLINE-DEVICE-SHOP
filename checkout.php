<?php
include 'includes/mehedi_header.php';
include 'includes/shihab_db_connect.php';

$shihab_subtotal = 0;
$shihab_tax_rate = 0.05; // 5% est tax
$mehedi_cart_items = [];

if (isset($_SESSION['sshihabb007_cart']) && !empty($_SESSION['sshihabb007_cart'])) {
    global $shihab_pdo;
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
<h1 class="font-h2 text-h2 text-primary mb-stack-md">Secure Checkout</h1>
<div class="glass-panel p-stack-md rounded-xl space-y-stack-md">
    <?php if (empty($mehedi_cart_items)): ?>
        <p class="font-body-md text-body-md text-on-surface-variant">Your digital vault is currently empty.</p>
    <?php else: ?>
        <?php foreach ($mehedi_cart_items as $item): ?>
            <!-- Item -->
            <div class="flex gap-stack-md items-center border-b border-outline-variant/20 pb-stack-md">
            <div class="w-24 h-24 rounded-lg overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent z-10"></div>
            <img alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-full h-full object-cover" src="<?php echo htmlspecialchars($item['image_url']); ?>"/>
            </div>
            <div class="flex-1">
            <h3 class="font-h3 text-h3 text-primary"><?php echo htmlspecialchars($item['name']); ?></h3>
            <p class="font-body-md text-body-md text-on-surface-variant mt-unit"><?php echo htmlspecialchars($item['category']); ?></p>
            </div>
            <div class="text-right">
            <div class="font-h3 text-h3 text-primary-fixed-dim">$<?php echo number_format($item['price'], 2); ?></div>
            <div class="flex items-center gap-unit mt-unit justify-end">
            <span class="font-body-md text-body-md w-6 text-center">Qty: <?php echo $item['quantity']; ?></span>
            </div>
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
<span class="font-body-md text-body-md text-on-surface-variant">Subtotal</span>
<span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_subtotal, 2); ?></span>
</div>
<div class="flex justify-between">
<span class="font-body-md text-body-md text-on-surface-variant">Encrypted Shipping</span>
<span class="font-body-md text-body-md text-primary-fixed-dim">Free</span>
</div>
<div class="flex justify-between">
<span class="font-body-md text-body-md text-on-surface-variant">Taxes (Est)</span>
<span class="font-body-md text-body-md text-primary">$<?php echo number_format($shihab_taxes, 2); ?></span>
</div>
</div>
<div class="flex justify-between items-center py-stack-md">
<span class="font-h3 text-h3 text-primary">Total</span>
<span class="font-h2 text-h2 text-primary-fixed-dim tracking-tight">$<?php echo number_format($shihab_total, 2); ?></span>
</div>
<button class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase tracking-wider flex items-center justify-center gap-unit">
                        Proceed to Payment
                        <span class="material-symbols-outlined">arrow_forward</span>
</button>
<div class="mt-stack-sm text-center flex items-center justify-center gap-unit opacity-70">
<span class="material-symbols-outlined text-[16px]">lock</span>
<span class="font-label-caps text-label-caps text-on-surface-variant">AES-256 Bit Encryption</span>
</div>
</div>
</div>
</div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
