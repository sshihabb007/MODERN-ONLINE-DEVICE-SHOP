<?php
include 'includes/mehedi_header.php';
include 'includes/shihab_db_connect.php';
global $shihab_pdo;

// Fetch featured product for hero card
$sshihabb007_featured_stmt = $shihab_pdo->query("SELECT * FROM shihab_products WHERE is_featured = 1 LIMIT 1");
$shihab_featured = $sshihabb007_featured_stmt->fetch(PDO::FETCH_ASSOC);

// Fetch trending products (latest 3)
$mehedi_trending_stmt = $shihab_pdo->query("SELECT * FROM shihab_products ORDER BY id DESC LIMIT 3");
$sshihabb007_trending = $mehedi_trending_stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch two side cards
$shihab_side_stmt = $shihab_pdo->query("SELECT * FROM shihab_products WHERE is_featured = 0 ORDER BY id ASC LIMIT 2");
$mehedi_side_products = $shihab_side_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="pt-12 md:pt-16 pb-32 max-w-container-max mx-auto px-gutter relative min-h-screen flex-grow">
<!-- Ambient Background Glows -->
<div class="fixed top-[-10%] left-[-10%] w-[40%] h-[40%] bg-secondary-container/20 blur-[120px] rounded-full pointer-events-none -z-10"></div>
<div class="fixed bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-primary-fixed-dim/10 blur-[100px] rounded-full pointer-events-none -z-10"></div>
<!-- Hero Section -->
<section class="flex flex-col lg:flex-row items-center justify-between gap-margin mb-margin relative">
<div class="lg:w-1/2 flex flex-col gap-stack-lg z-10">
<div class="flex flex-col gap-stack-sm">
<span class="inline-block w-max bg-secondary-container/20 text-secondary font-label-caps text-label-caps px-3 py-1 rounded-full border border-secondary-container">NEXT-GEN COMPUTE</span>
<h1 class="font-display text-display text-primary drop-shadow-[0_0_10px_rgba(255,255,255,0.2)]">
                        Transcend <br/>
<span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed-dim to-secondary">Reality.</span>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg mt-stack-md">
                        Equip yourself with cyber-luxe rigs engineered for absolute dominance. Welcome to the command center of tomorrow.
                    </p>
</div>
<div class="flex items-center gap-stack-md">
<a href="pages/products.php" class="bg-transparent border border-primary-fixed-dim text-primary-fixed-dim font-button text-button px-8 py-4 rounded-lg hover:bg-gradient-to-r hover:from-primary-fixed-dim hover:to-secondary-container hover:text-primary hover:border-transparent transition-all duration-300 shadow-[0_0_10px_rgba(0,221,221,0.2)] hover:shadow-[0_0_20px_rgba(0,221,221,0.5)]">
                        Explore Rigs
                    </a>
<a href="#sshihabb007-trending" class="bg-white/5 backdrop-blur-md text-primary font-button text-button px-8 py-4 rounded-lg hover:bg-white/10 transition-colors flex items-center gap-2">
<span class="material-symbols-outlined">keyboard_arrow_down</span>
                        See Trending
                    </a>
</div>
</div>
<!-- Hero Image / 3D Asset Area -->
<div class="lg:w-1/2 relative flex justify-center items-center aspect-square lg:aspect-auto w-full h-[400px] lg:h-[600px]">
<!-- Holographic Orbit Rings -->
<div class="absolute w-[80%] h-[80%] rounded-full border border-primary-fixed-dim/20 pointer-events-none"></div>
<div class="absolute w-[60%] h-[60%] rounded-full border border-secondary/20 pointer-events-none rotate-45"></div>
<!-- Main Asset -->
<div class="relative w-full h-full max-w-[500px] max-h-[500px] flex items-center justify-center">
<img alt="3d laptop floating" class="w-full h-auto object-contain drop-shadow-[0_0_30px_rgba(0,221,221,0.4)] z-10" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0xFeubs8DCKAECNXX9FQvR6kCc6e9tAUc3XGJjK6mmtFtK7yObwxlNXFPq4kaOZoFwnUptajRsaSASKl8TdEempu7DMMONrhHQjkShHK9Z0NNbjkGiIHkXc05Xzas0hlkZrKpBQEnIvsGt5fjysmfRTsWqFu3rDXKVoWY_z9xzKFZG2M_DgqKKXnqcG16cOQ6nmSxurp7s5698ujrfLA5Io6r_HgYe_nqX5EKF-mgBODx_yS3Zus3gJ9d4ZTwyu5xMgJJAfp5DaoN"/>
<!-- Floating Specs Cards -->
<div class="absolute top-[10%] left-[-5%] bg-surface-dim/80 backdrop-blur-xl border border-primary-fixed-dim/50 rounded-xl p-3 flex flex-col items-center shadow-[0_0_15px_rgba(0,221,221,0.2)] z-20 hover:border-primary-fixed-dim transition-colors cursor-default">
<span class="material-symbols-outlined text-primary-fixed-dim mb-1">memory</span>
<span class="font-label-caps text-label-caps text-on-surface">Neural NPU</span>
</div>
<div class="absolute bottom-[20%] right-[-10%] bg-surface-dim/80 backdrop-blur-xl border border-secondary/50 rounded-xl p-3 flex flex-col items-center shadow-[0_0_15px_rgba(107,19,175,0.2)] z-20 hover:border-secondary transition-colors cursor-default">
<span class="material-symbols-outlined text-secondary mb-1">speed</span>
<span class="font-label-caps text-label-caps text-on-surface">Sub-Zero Cooling</span>
</div>
</div>
</div>
</section>
<!-- Refractive Divider -->
<div class="w-full h-px bg-gradient-to-r from-transparent via-primary-fixed-dim/50 to-transparent my-margin"></div>
<!-- Latest Flagship Showcase -->
<section class="mb-margin">
<div class="flex flex-col md:flex-row items-center bg-surface-container/30 backdrop-blur-lg border border-primary-fixed-dim/30 rounded-2xl overflow-hidden shadow-[0_0_30px_rgba(0,221,221,0.1)]">
<div class="md:w-1/2 p-margin flex flex-col justify-center">
<span class="bg-primary-fixed-dim/20 text-primary-fixed-dim font-label-caps text-label-caps px-3 py-1 rounded-full border border-primary-fixed-dim/50 w-max mb-stack-sm">FLAGSHIP DEVICE</span>
<h2 class="font-h1 text-h1 text-primary mb-stack-md leading-tight">Pixel Quantum 9<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-fixed-dim to-secondary">Reimagined.</span></h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-lg">Experience the pinnacle of mobile computing. The Pixel Quantum 9 integrates seamlessly with the Axiom network, delivering unparalleled AI processing and holographic display technology.</p>
<div class="flex items-center gap-stack-md">
<button class="bg-primary-fixed-dim text-surface-dim font-button text-button px-6 py-3 rounded-lg hover:bg-white transition-colors shadow-[0_0_15px_rgba(0,221,221,0.4)]">Pre-Order Now</button>
<a class="text-primary hover:text-primary-fixed-dim font-button flex items-center gap-2 transition-colors" href="#">View Specs <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
</div>
</div>
<div class="md:w-1/2 relative h-[400px] md:h-[600px] bg-surface-dim/50 flex items-center justify-center p-stack-lg">
<div class="absolute inset-0 bg-gradient-to-br from-primary-fixed-dim/10 to-secondary/10 opacity-50 z-0"></div>
<img alt="Pixel Quantum 9" class="w-full h-full object-cover rounded-xl shadow-2xl relative z-10 drop-shadow-[0_0_40px_rgba(0,221,221,0.3)]" src="https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp"/>
</div>
</div>
</section>
<!-- Pixel Ecosystem -->
<section class="mb-margin">
<div class="text-center mb-stack-lg">
<h2 class="font-h2 text-h2 text-primary">The Pixel Ecosystem</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-2xl mx-auto">Expand your digital horizon with seamlessly integrated tech designed for the modern operative.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Ecosystem Item 1 -->
<div class="bg-white/5 border border-outline-variant rounded-xl p-stack-md hover:border-primary-fixed-dim transition-all duration-300 hover:shadow-[0_0_20px_rgba(0,221,221,0.15)] group flex flex-col items-center text-center">
<div class="w-24 h-24 mb-stack-sm rounded-full bg-surface-container flex items-center justify-center border border-primary-fixed-dim/20 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl text-primary-fixed-dim">headphones</span>
</div>
<h3 class="font-body-lg text-primary font-semibold mb-1">Pixel Buds Pro 2</h3>
<p class="text-sm text-on-surface-variant mb-stack-sm">Immersive spatial audio with neural noise cancellation.</p>
<a class="text-primary-fixed-dim text-sm font-button hover:text-primary transition-colors mt-auto" href="#">Shop Audio</a>
</div>
<!-- Ecosystem Item 2 -->
<div class="bg-white/5 border border-outline-variant rounded-xl p-stack-md hover:border-secondary transition-all duration-300 hover:shadow-[0_0_20px_rgba(107,19,175,0.15)] group flex flex-col items-center text-center">
<div class="w-24 h-24 mb-stack-sm rounded-full bg-surface-container flex items-center justify-center border border-secondary/20 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl text-secondary">watch</span>
</div>
<h3 class="font-body-lg text-primary font-semibold mb-1">Pixel Watch 3</h3>
<p class="text-sm text-on-surface-variant mb-stack-sm">Biometric tracking and seamless chronos integration.</p>
<a class="text-secondary text-sm font-button hover:text-primary transition-colors mt-auto" href="#">Shop Wearables</a>
</div>
<!-- Ecosystem Item 3 -->
<div class="bg-white/5 border border-outline-variant rounded-xl p-stack-md hover:border-primary-fixed-dim transition-all duration-300 hover:shadow-[0_0_20px_rgba(0,221,221,0.15)] group flex flex-col items-center text-center">
<div class="w-24 h-24 mb-stack-sm rounded-full bg-surface-container flex items-center justify-center border border-primary-fixed-dim/20 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl text-primary-fixed-dim">tablet_mac</span>
</div>
<h3 class="font-body-lg text-primary font-semibold mb-1">Pixel Tablet X</h3>
<p class="text-sm text-on-surface-variant mb-stack-sm">Your portable command center for smart home control.</p>
<a class="text-primary-fixed-dim text-sm font-button hover:text-primary transition-colors mt-auto" href="#">Shop Tablets</a>
</div>
<!-- Ecosystem Item 4 -->
<div class="bg-white/5 border border-outline-variant rounded-xl p-stack-md hover:border-secondary transition-all duration-300 hover:shadow-[0_0_20px_rgba(107,19,175,0.15)] group flex flex-col items-center text-center">
<div class="w-24 h-24 mb-stack-sm rounded-full bg-surface-container flex items-center justify-center border border-secondary/20 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl text-secondary">router</span>
</div>
<h3 class="font-body-lg text-primary font-semibold mb-1">Nest Wifi Pro 6E</h3>
<p class="text-sm text-on-surface-variant mb-stack-sm">Hyper-fast, secure connectivity for the entire grid.</p>
<a class="text-secondary text-sm font-button hover:text-primary transition-colors mt-auto" href="#">Shop Networking</a>
</div>
</div>
</section>
<!-- Why Choose Axiom Features -->
<section class="mb-margin">
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<div class="bg-surface-container-high/50 p-stack-md rounded-2xl border border-outline-variant/30 flex flex-col items-start hover:bg-surface-container-high transition-colors">
<div class="bg-primary-fixed-dim/10 p-3 rounded-lg border border-primary-fixed-dim/30 mb-stack-sm">
<span class="material-symbols-outlined text-primary-fixed-dim text-3xl">bolt</span>
</div>
<h3 class="font-h3 text-h3 text-primary mb-2">Quantum Performance</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Overclocked processors and proprietary neural engines deliver speeds that defy logic.</p>
</div>
<div class="bg-surface-container-high/50 p-stack-md rounded-2xl border border-outline-variant/30 flex flex-col items-start hover:bg-surface-container-high transition-colors">
<div class="bg-secondary/10 p-3 rounded-lg border border-secondary/30 mb-stack-sm">
<span class="material-symbols-outlined text-secondary text-3xl">shield_lock</span>
</div>
<h3 class="font-h3 text-h3 text-primary mb-2">Crystal Security</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Military-grade encryption and decentralized data vaults keep your assets untouchable.</p>
</div>
<div class="bg-surface-container-high/50 p-stack-md rounded-2xl border border-outline-variant/30 flex flex-col items-start hover:bg-surface-container-high transition-colors">
<div class="bg-primary-fixed-dim/10 p-3 rounded-lg border border-primary-fixed-dim/30 mb-stack-sm">
<span class="material-symbols-outlined text-primary-fixed-dim text-3xl">ac_unit</span>
</div>
<h3 class="font-h3 text-h3 text-primary mb-2">Sub-Zero Cooling</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Advanced cryo-thermal management systems ensure peak performance without thermal throttling.</p>
</div>
</div>
</section>
<!-- Trending Tech (Bento Grid) - DYNAMIC -->
<section id="sshihabb007-trending" class="flex flex-col gap-stack-lg mb-margin">
<div class="flex justify-between items-end">
<div>
<h2 class="font-h2 text-h2 text-primary">Trending Tech</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">The latest artifacts acquired for the vault.</p>
</div>
<a class="hidden md:flex items-center gap-1 text-primary-fixed-dim font-button text-button hover:text-primary transition-colors" href="pages/products.php">
    View All <span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter auto-rows-[250px]">

<?php if ($shihab_featured): ?>
<!-- Feature Card Large (featured product from DB) -->
<div class="md:col-span-2 md:row-span-2 relative group rounded-xl overflow-hidden bg-white/5 border border-primary-fixed-dim/20 hover:border-primary-fixed-dim transition-all duration-300 shadow-[0_0_10px_rgba(0,221,221,0.05)] hover:shadow-[0_0_20px_rgba(0,221,221,0.2)]">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dim via-transparent to-transparent z-10 pointer-events-none"></div>
<a href="pages/product-details.php?id=<?php echo $shihab_featured['id']; ?>" class="absolute inset-0 block z-0">
<img alt="<?php echo htmlspecialchars($shihab_featured['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo htmlspecialchars($shihab_featured['image_url']); ?>"/>
</a>
<div class="absolute bottom-0 left-0 p-gutter w-full z-20 flex justify-between items-end">
<div class="flex flex-col gap-2">
<span class="bg-secondary-container/80 backdrop-blur-md text-white font-label-caps text-label-caps px-2 py-1 rounded w-max">⭐ FEATURED</span>
<h3 class="font-h3 text-h3 text-primary"><?php echo htmlspecialchars($shihab_featured['name']); ?></h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-sm"><?php echo htmlspecialchars(mb_substr($shihab_featured['description'], 0, 80)) . '...'; ?></p>
<span class="font-h3 text-h3 text-primary-fixed-dim">$<?php echo number_format($shihab_featured['price'], 2); ?></span>
</div>
<form method="POST" action="actions/mehedi_cart_action.php" class="z-30 relative">
<input type="hidden" name="id" value="<?php echo $shihab_featured['id']; ?>">
<button type="submit" name="add_to_cart" class="bg-white/10 backdrop-blur-md hover:bg-primary-fixed-dim hover:text-black border border-primary-fixed-dim/50 text-primary-fixed-dim rounded-full p-3 transition-colors">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</form>
</div>
</div>
<?php endif; ?>

<?php foreach ($mehedi_side_products as $shihab_side): ?>
<!-- Side Card from DB -->
<div class="relative group rounded-xl overflow-hidden bg-white/5 border border-outline-variant hover:border-primary-fixed-dim transition-all duration-300 shadow-[0_0_10px_rgba(0,0,0,0.2)] hover:shadow-[0_0_15px_rgba(0,221,221,0.15)] flex flex-col">
<div class="absolute inset-0 bg-gradient-to-t from-surface-dim/80 to-transparent z-10 pointer-events-none"></div>
<a href="pages/product-details.php?id=<?php echo $shihab_side['id']; ?>" class="h-3/5 w-full bg-surface-container-high relative overflow-hidden block">
<img alt="<?php echo htmlspecialchars($shihab_side['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo htmlspecialchars($shihab_side['image_url']); ?>"/>
</a>
<div class="p-4 z-20 flex-grow flex flex-col justify-end bg-surface-dim/50 backdrop-blur-sm">
<a href="pages/product-details.php?id=<?php echo $shihab_side['id']; ?>">
<h3 class="font-body-lg text-body-lg text-primary font-semibold hover:text-primary-fixed-dim transition-colors"><?php echo htmlspecialchars($shihab_side['name']); ?></h3>
</a>
<div class="flex justify-between items-center mt-2">
<span class="font-h3 text-h3 text-primary-fixed-dim">$<?php echo number_format($shihab_side['price'], 2); ?></span>
<form method="POST" action="actions/mehedi_cart_action.php">
<input type="hidden" name="id" value="<?php echo $shihab_side['id']; ?>">
<button type="submit" name="add_to_cart" class="text-on-surface-variant hover:text-primary transition-colors p-1 hover:bg-primary-fixed-dim/10 rounded-full">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</form>
</div>
</div>
</div>
<?php endforeach; ?>

</div>
</section>
<!-- Call to Action -->
<section class="mt-margin relative rounded-3xl overflow-hidden bg-surface-container/40 border border-primary-fixed-dim/20 shadow-[0_0_40px_rgba(0,221,221,0.1)] p-margin text-center">
<div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary-fixed-dim/5 pointer-events-none"></div>
<div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-px bg-gradient-to-r from-transparent via-primary-fixed-dim/50 to-transparent"></div>
<div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center">
<span class="material-symbols-outlined text-5xl text-primary-fixed-dim mb-4 drop-shadow-[0_0_10px_rgba(0,221,221,0.5)]">hub</span>
<h2 class="font-display text-h1 text-primary mb-4">Ready to Upgrade?</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-8">Join the elite ranks. Access exclusive drops, early tech previews, and hyper-personalized loadouts.</p>
<a href="pages/profile.php" class="bg-gradient-to-r from-primary-fixed-dim to-secondary-container text-primary font-button text-button px-10 py-4 rounded-xl hover:shadow-[0_0_25px_rgba(0,221,221,0.6)] transition-all duration-300 transform hover:-translate-y-1 inline-block">
            Join the Nexus
        </a>
</div>
</section>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
