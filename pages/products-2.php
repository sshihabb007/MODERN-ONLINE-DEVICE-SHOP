<?php include '../includes/mehedi_header.php'; ?>
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
<span class="font-body-md text-body-md text-on-surface-variant">Showing 15 results</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Product Card 1 -->
<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-video bg-surface-container-lowest overflow-hidden">
<img alt="Futuristic gaming laptop" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0xFeubs8DCKAECNXX9FQvR6kCc6e9tAUc3XGJjK6mmtFtK7yObwxlNXFPq4kaOZoFwnUptajRsaSASKl8TdEempu7DMMONrhHQjkShHK9Z0NNbjkGiIHkXc05Xzas0hlkZrKpBQEnIvsGt5fjysmfRTsWqFu3rDXKVoWY_z9xzKFZG2M_DgqKKXnqcG16cOQ6nmSxurp7s5698ujrfLA5Io6r_HgYe_nqX5EKF-mgBODx_yS3Zus3gJ9d4ZTwyu5xMgJJAfp5DaoN"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
<div class="absolute top-2 right-2 bg-secondary-container/80 text-secondary-fixed px-2 py-1 rounded font-label-caps text-label-caps backdrop-blur-md">
                            NEW
                        </div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">Axiom Blade Pro</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">Ultra-slim gaming laptop with brushed titanium chassis and violet backlit keys. 8K ray-traced display.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$2,499</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<!-- Product Card 2 -->
<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-[3/4] bg-surface-container-lowest overflow-hidden">
<img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" data-alt="A sleek, futuristic smartphone encased in a glowing acrylic block. The device features an edge-to-edge display showing a vibrant cyan and purple data visualization. The setting is a dark, high-end tech laboratory with subtle neon lighting reflecting off the glass surfaces. The mood is cutting-edge and exclusive. 8k resolution, macro photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCztsNKhKEFr11JLgNXhhd961J1Vdi-KNDm2k1dIo9DSWHTlrOam5Izl6ttLDCdN6Kv8HoZal0WVirORxklUar_Nj_6kXZ5Pl_OsoHUbbw3MCDJqXAL2niDUL3MRImYUEN9uYwNzGk2nK5y1qdva2_5cNr2kT3Vtft_jefTHXNxZkO4F4QFT707mG80d3X5-wsEeUi2y7LAv-PRQhDuwkpu00XXVP_rAkGFqC1UBVl42DJeiMMjaDxPuosPMxy2v8JLSeMKveo0ZvdF"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">Nexus Prism X</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">Holographic display smartphone with quantum processor and adaptive glass back.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$1,299</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<!-- Product Card 3 -->
<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-square bg-surface-container-lowest overflow-hidden">
<img class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" data-alt="A futuristic smartwatch floating in mid-air against a deep black void. The watch face displays a complex, glowing cyan interface with intricate data dials. The strap is made of a matte black, textured material that looks like carbon fiber. Subtle purple rim lighting highlights the metallic bezel. Cinematic lighting, hyper-realistic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuChxc49hi5HLO_tA8q7VQPMWbg6IQa6qvtRv5rNIlyZFhT5qDPsOhBwGkan9QtrDeBEhtJkk9hVg-7CkQtfotuptJU1oRNSWkRSn6X8cbC1nZNNqcREkuNLpOPcNNcg3xbOIK2ACCJWfkxAiN3mm7Z5yFr1iJENs2TemE_qbaGLyPGoEC1xXON-88dxqDntxCXyVW6B4RRO2ShsgaA9Uju70HvOqw7YoCCks74JfxpfBJNM0aELVahU2ix2e7dxpW3KkWwbjIv9VWW1"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">Chrono Sync v2</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">Neural-link compatible wearable with biometric encryption and fluid-metal chassis.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$599</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-video bg-surface-container-lowest overflow-hidden">
<img alt="iCrystal 16 Pro" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/ADBb0uhN5co7EVf8fG4cOFcIhlib4jylCSOEDMumrGYrli0OThj3EfZo-qqnWg1WAFNS03Rr7o8vL8UyF1YayXr3X1WAUPVd_dooqOnI3M7hcwQnHNEJ1Hc9klSSrUUuoyij5nmPise9Vmrnt9lk7DTWnXgXrnqJkm8bKP0qqGNI-uRCQoujd4LxGpXFy8uXwLyfQ3sayta8ZcZDmk7UoHJGFztUKqgs_ccauT0xDFbjTK4bT4t4wQaeimZ0CL6y"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">iCrystal 16 Pro</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">The pinnacle of sleek design with a sapphire glass front and advanced liquid-metal frame.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$1,499</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div><div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-[3/4] bg-surface-container-lowest overflow-hidden">
<img alt="Galaxy Nova S25" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/ADBb0ugIPenP46UGWNl0caGNtH_wV2JSmvVkz6Dw4qtoW4or0gFqFqKnWVp289ZQs4vdoCtcl06yCLa8o29ODTTz8nPhDleAbGlogSUNESaE24qdCYNhoS08ZOwi4WwTaGcRN5QrEYYvcwxlXUmuQtb8sMPJI-eqYlWMbeKpIyvxxn178pNCl-PnSSV0mtRVhfQbkWTvvJZfXUiPGwtnGKVWDA4EezFHQdDjvnYl5JpRnjmz5jBK72UyFBEfsJAX"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">Galaxy Nova S25</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">Boundless AMOLED display with integrated AI core for seamless neural processing.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$1,199</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div><div class="glass-card rounded-xl overflow-hidden group cursor-pointer flex flex-col h-full">
<div class="relative aspect-square bg-surface-container-lowest overflow-hidden">
<img alt="Pixel Quantum 9" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105" src="https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp"/>
<div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"></div>
</div>
<div class="p-stack-sm flex flex-col flex-1">
<h3 class="font-h3 text-h3 text-primary mb-1">Pixel Quantum 9</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-stack-sm flex-1">Pure Android experience powered by a next-gen tensor quantum-entangled processor.</p>
<div class="flex justify-between items-end mt-auto">
<span class="font-h2 text-h2 text-primary-fixed-dim">$999</span>
<button class="text-primary-fixed-dim hover:text-primary transition-colors p-2 bg-white/5 rounded-full border border-primary-fixed-dim/30 hover:bg-primary-fixed-dim/20">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div></div>
<!-- Load More / Glitch Loader -->
<div class="mt-stack-lg flex justify-center">
<button class="ghost-button font-button text-button text-primary px-8 py-3 rounded-full flex items-center gap-2">
<span class="material-symbols-outlined">autorenew</span>
                    Load More Artifacts
                </button>
</div>
</div>
</main>
<?php include '../includes/sshihabb007_footer.php'; ?>
