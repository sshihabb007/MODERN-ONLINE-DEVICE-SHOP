<?php
session_start();
if (!isset($_SESSION['sshihabb007_role']) || $_SESSION['sshihabb007_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<?php include 'includes/mehedi_header.php'; ?>
<main class="flex-1 md:ml-64 pt-20 md:pt-margin px-gutter md:px-margin pb-32 max-w-container-max mx-auto w-full flex-grow">
<div class="mb-stack-lg flex flex-col md:flex-row md:items-end justify-between gap-stack-md">
<div>
<h1 class="font-h1 text-h1 text-primary mb-unit">Forge New Artifact</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Input technical specifications to register a new item in the Neon-Glass network.</p>
</div>
<div class="flex gap-stack-sm">
<button class="btn-secondary-glass px-6 py-3 rounded-lg font-button text-button">Cancel</button>
<button class="btn-ghost-glass px-8 py-3 rounded-lg font-button text-button flex items-center gap-2 aurora-glow">
<span class="material-symbols-outlined text-lg">memory</span>
                    Forge Artifact
                </button>
</div>
</div>
<!-- Main Form Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Core Data -->
<div class="lg:col-span-8 flex flex-col gap-gutter">
<!-- Primary Information Panel -->
<section class="glass-panel rounded-xl p-stack-lg glass-panel-interactive">
<h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-2 border-b border-outline-variant/30 pb-2">
<span class="material-symbols-outlined text-primary-container">info</span>
                        Core Specifications
                    </h2>
<div class="space-y-stack-md mt-stack-sm">
<!-- Product Name -->
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Designation / Artifact Name</label>
<input class="glass-input w-full p-3 font-body-lg text-body-lg" placeholder="e.g. Quantum Interface Module v2" type="text" value="Axiom Visualizer Core"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
<!-- Category -->
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Classification Node</label>
<select class="glass-select w-full p-3 rounded font-body-md text-body-md">
<option>Cyberware</option>
<option selected="">Neural Interfaces</option>
<option>Visual Augmentation</option>
<option>Tactile Feedback</option>
</select>
</div>
<!-- Status -->
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Network Status</label>
<select class="glass-select w-full p-3 rounded font-body-md text-body-md">
<option selected="">Active Listing</option>
<option>Draft Mode</option>
<option>Archived</option>
</select>
</div>
</div>
<!-- Description -->
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Data Packet Description</label>
<textarea class="glass-input w-full p-3 h-32 font-body-md text-body-md resize-none" placeholder="Enter detailed specifications and usage protocols..."></textarea>
</div>
</div>
</section>
<!-- Technical Metadata Section (Dynamic Key-Value Pairs) -->
<section class="glass-panel rounded-xl p-stack-lg glass-panel-interactive">
<div class="flex justify-between items-center mb-stack-md border-b border-outline-variant/30 pb-2">
<h2 class="font-h3 text-h3 text-primary flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container">data_object</span>
                            Technical Metadata
                        </h2>
<button class="btn-secondary-glass p-2 rounded-full flex items-center justify-center text-primary-fixed-dim hover:text-primary">
<span class="material-symbols-outlined">add</span>
</button>
</div>
<div class="space-y-stack-sm">
<!-- Key Value Row 1 -->
<div class="flex gap-3 items-start">
<div class="w-1/3">
<input class="glass-input w-full p-2 font-body-md text-body-md text-on-surface-variant" type="text" value="Neural Core"/>
</div>
<div class="w-2/3 flex gap-2">
<input class="glass-input w-full p-2 font-body-md text-body-md text-primary" type="text" value="Optic-Bypass v4.2"/>
<button class="text-outline hover:text-error transition-colors p-2">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</div>
<!-- Key Value Row 2 -->
<div class="flex gap-3 items-start">
<div class="w-1/3">
<input class="glass-input w-full p-2 font-body-md text-body-md text-on-surface-variant" type="text" value="Chassis Finish"/>
</div>
<div class="w-2/3 flex gap-2">
<input class="glass-input w-full p-2 font-body-md text-body-md text-primary" type="text" value="Matte Obsidian / Cyan Trim"/>
<button class="text-outline hover:text-error transition-colors p-2">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</div>
<!-- Key Value Row 3 -->
<div class="flex gap-3 items-start">
<div class="w-1/3">
<input class="glass-input w-full p-2 font-body-md text-body-md text-on-surface-variant" placeholder="Parameter Key" type="text"/>
</div>
<div class="w-2/3 flex gap-2">
<input class="glass-input w-full p-2 font-body-md text-body-md text-primary" placeholder="Parameter Value" type="text"/>
<button class="text-outline hover:text-error transition-colors p-2">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</div>
</div>
</section>
<!-- Pricing & Inventory -->
<section class="glass-panel rounded-xl p-stack-lg glass-panel-interactive grid grid-cols-1 md:grid-cols-2 gap-stack-md">
<div>
<h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-2 border-b border-outline-variant/30 pb-2">
<span class="material-symbols-outlined text-primary-container">monetization_on</span>
                            Exchange Value
                        </h2>
<div class="relative mt-stack-sm">
<span class="absolute left-3 top-3 text-primary-fixed-dim font-h3">¢</span>
<input class="glass-input w-full p-3 pl-8 font-h2 text-h2 text-primary-fixed-dim glowing-text" type="number" value="2450.00"/>
</div>
</div>
<div>
<h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-2 border-b border-outline-variant/30 pb-2">
<span class="material-symbols-outlined text-primary-container">inventory</span>
                            Stock Units
                        </h2>
<div class="mt-stack-sm">
<input class="glass-input w-full p-3 font-h3 text-h3" type="number" value="14"/>
</div>
</div>
</section>
</div>
<!-- Right Column: Media Upload -->
<div class="lg:col-span-4 flex flex-col gap-gutter">
<section class="glass-panel rounded-xl p-stack-lg glass-panel-interactive h-full flex flex-col">
<h2 class="font-h3 text-h3 text-primary mb-stack-md flex items-center gap-2 border-b border-outline-variant/30 pb-2">
<span class="material-symbols-outlined text-primary-container">image</span>
                        Visual Data
                    </h2>
<!-- Primary Upload Zone -->
<div class="border-2 border-dashed border-primary-fixed-dim/30 rounded-xl p-stack-md flex flex-col items-center justify-center text-center bg-surface-container/30 hover:bg-surface-container/50 hover:border-primary-fixed-dim transition-all cursor-pointer mb-stack-md group min-h-[200px]">
<span class="material-symbols-outlined text-4xl text-outline group-hover:text-primary-fixed-dim mb-3 transition-colors">cloud_upload</span>
<p class="font-body-md text-body-md text-on-surface mb-1">Drag &amp; Drop Holograms</p>
<p class="font-label-caps text-label-caps text-on-surface-variant">or click to browse local files</p>
</div>
<!-- Image Grid -->
<div class="grid grid-cols-2 gap-stack-sm flex-grow">
<!-- Image 1 -->
<div class="relative rounded-lg overflow-hidden border border-outline-variant/50 group aspect-square">
<img alt="A detailed close-up of a futuristic neural interface component, featuring intricate glowing cyan circuitry etched onto a matte black metallic surface. The component is slightly blurred around the edges, emphasizing depth of field in a moody, low-key lighting environment typical of a cyberpunk high-tech laboratory." class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida/ADBb0uhN5co7EVf8fG4cOFcIhlib4jylCSOEDMumrGYrli0OThj3EfZo-qqnWg1WAFNS03Rr7o8vL8UyF1YayXr3X1WAUPVd_dooqOnI3M7hcwQnHNEJ1Hc9klSSrUUuoyij5nmPise9Vmrnt9lk7DTWnXgXrnqJkm8bKP0qqGNI-uRCQoujd4LxGpXFy8uXwLyfQ3sayta8ZcZDmk7UoHJGFztUKqgs_ccauT0xDFbjTK4bT4t4wQaeimZ0CL6y"/>
<div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
<button class="p-2 bg-error/20 text-error rounded-full hover:bg-error hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 bg-primary/20 text-primary rounded-full hover:bg-primary hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">visibility</span>
</button>
</div>
<div class="absolute top-2 left-2 bg-secondary-container/80 backdrop-blur-md text-primary px-2 py-1 rounded text-xs font-label-caps border border-primary-fixed-dim/50">Primary</div>
</div>
<!-- Image 2 -->
<div class="relative rounded-lg overflow-hidden border border-outline-variant/50 group aspect-square">
<img alt="A sleek, minimalist cybernetic optical implant resting on a dark, reflective glass surface. The device emits a faint, pulsing aura of neon purple light, contrasting sharply against the pitch-black background. Sharp geometric lines define its chassis, lit by a single, cool white spotlight from above, creating a stark, premium tech aesthetic." class="w-full h-full object-cover" src="https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp"/>
<div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
<button class="p-2 bg-error/20 text-error rounded-full hover:bg-error hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 bg-primary/20 text-primary rounded-full hover:bg-primary hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">visibility</span>
</button>
</div>
</div>
<!-- Image 3 -->
<div class="relative rounded-lg overflow-hidden border border-outline-variant/50 group aspect-square">
<img alt="An abstract, high-contrast digital rendering showing a network of glowing cyan and magenta data streams flowing across a dark grid. The streams appear as sharp, crystalline structures, conveying a sense of rapid data transfer and advanced computational processing in a dark-mode, futuristic environment." class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida/ADBb0ugk-pMYOtUug_Kw9aHQkB6-rtrKqXwkoaGdpZifpNfWZHWHp72LV8Lx03a8IoOD__27z_-TyQOdIBNufxjKRz69Eq2ElUsMS2oP0cBh4ZhR6dsIG913ltYs_eTUvzpin3I2Jw5eYA3LQ-HSyJqvtP0OA8q6iv5KCa__uYfacBNf-yZAoatvJ1cPCyQtM-deAfEnpauaLNpGGLT-GePBHJbq-j8qBl-SUvS6O1RBEQDaW7eYy8rcw0iWHjL3"/>
<div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
<button class="p-2 bg-error/20 text-error rounded-full hover:bg-error hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 bg-primary/20 text-primary rounded-full hover:bg-primary hover:text-black transition-colors backdrop-blur-md">
<span class="material-symbols-outlined text-sm">visibility</span>
</button>
</div>
</div>
<!-- Add More Button -->
<div class="border border-dashed border-outline-variant/50 rounded-lg flex items-center justify-center text-outline hover:text-primary-fixed-dim hover:border-primary-fixed-dim transition-colors cursor-pointer aspect-square bg-white/5">
<span class="material-symbols-outlined text-3xl">add_photo_alternate</span>
</div>
</div>
</section>
</div>
</div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
