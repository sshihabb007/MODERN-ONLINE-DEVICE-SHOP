<?php
session_start();
if (!isset($_SESSION['sshihabb007_role']) || $_SESSION['sshihabb007_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<?php include 'includes/mehedi_header.php'; ?>
<main class="max-w-container-max mx-auto px-margin pt-[120px] pb-margin grid grid-cols-1 lg:grid-cols-12 gap-gutter flex-grow">
<!-- Header Section -->
<div class="col-span-1 lg:col-span-12 mb-stack-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary-fixed-dim text-sm">arrow_back</span>
<a class="font-button text-button text-on-surface-variant hover:text-primary transition-colors" href="#">Back to Inventory</a>
</div>
<h1 class="font-h1 text-h1 text-primary">Update Device Info</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Axiom Quantum Edge X // ID: AQE-X-992</p>
</div>
<div class="flex gap-4 w-full md:w-auto">
<button class="flex-1 md:flex-none font-button text-button bg-white/5 text-on-background px-6 py-3 rounded-DEFAULT hover:bg-white/10 transition-colors backdrop-blur-md flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">visibility</span>
                    Preview on Storefront
                </button>
<button class="flex-1 md:flex-none font-button text-button border border-primary-fixed-dim text-primary-fixed-dim px-6 py-3 rounded-DEFAULT hover:bg-gradient-to-r hover:from-primary-fixed-dim hover:to-secondary-container hover:text-white hover:border-transparent transition-all duration-300 flex items-center justify-center gap-2 relative overflow-hidden group">
<div class="absolute inset-0 bg-primary-fixed-dim/10 group-hover:opacity-0 transition-opacity"></div>
<span class="material-symbols-outlined text-sm z-10">save</span>
<span class="z-10">Save Changes</span>
</button>
</div>
</div>
<!-- Left Column: Product Render & Status (5 cols) -->
<div class="col-span-1 lg:col-span-5 flex flex-col gap-gutter">
<!-- Glass Container for Render -->
<div class="relative w-full aspect-[4/5] rounded-xl border border-outline-variant/30 bg-surface/5 backdrop-blur-xl overflow-hidden group shadow-[0_0_15px_rgba(0,221,221,0.05)] hover:border-primary-fixed-dim/50 transition-colors duration-500 flex items-center justify-center">
<!-- Decorative Elements -->
<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent via-background/20 to-background z-10"></div>
<div class="absolute top-4 left-4 z-20 flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary-fixed-dim animate-pulse"></div>
<span class="font-label-caps text-label-caps text-primary-fixed-dim uppercase tracking-widest">Live Render</span>
</div>
<div class="absolute bottom-4 right-4 z-20">
<button class="w-10 h-10 rounded-full border border-outline-variant/50 bg-background/50 backdrop-blur-md flex items-center justify-center text-on-surface hover:border-primary-fixed-dim hover:text-primary transition-colors">
<span class="material-symbols-outlined">crop_free</span>
</button>
</div>
<!-- Main Render Image -->
<img alt="" class="absolute inset-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-700 mix-blend-lighten z-0" src="https://lh3.googleusercontent.com/aida/ADBb0uhN5co7EVf8fG4cOFcIhlib4jylCSOEDMumrGYrli0OThj3EfZo-qqnWg1WAFNS03Rr7o8vL8UyF1YayXr3X1WAUPVd_dooqOnI3M7hcwQnHNEJ1Hc9klSSrUUuoyij5nmPise9Vmrnt9lk7DTWnXgXrnqJkm8bKP0qqGNI-uRCQoujd4LxGpXFy8uXwLyfQ3sayta8ZcZDmk7UoHJGFztUKqgs_ccauT0xDFbjTK4bT4t4wQaeimZ0CL6y"/>
<!-- Overlay Grid for Cyberpunk feel -->
<div class="absolute inset-0 bg-[linear-gradient(rgba(0,221,221,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,221,221,0.03)_1px,transparent_1px)] bg-[size:20px_20px] pointer-events-none z-10 opacity-50"></div>
</div>
<!-- Status & Inventory Panel -->
<div class="rounded-xl border border-outline-variant/30 bg-surface/5 backdrop-blur-md p-6 relative overflow-hidden">
<div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-primary-fixed-dim to-secondary-container"></div>
<h3 class="font-h3 text-h3 text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary-fixed-dim">settings_power</span>
                    Deployment Status
                </h3>
<div class="flex items-center justify-between mb-8 pb-8 border-b border-outline-variant/20">
<div>
<p class="font-body-md text-body-md text-primary font-medium mb-1">Visibility</p>
<p class="font-body-md text-body-md text-on-surface-variant text-sm">Currently Active on Storefront</p>
</div>
<!-- Custom Toggle -->
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-14 h-7 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all border border-outline-variant/50 peer-checked:bg-primary-fixed-dim peer-checked:border-primary-fixed-dim shadow-[0_0_10px_rgba(0,221,221,0.2)]"></div>
<span class="ml-3 font-label-caps text-label-caps text-primary uppercase">Active</span>
</label>
</div>
<div class="flex items-center justify-between">
<div>
<p class="font-body-md text-body-md text-primary font-medium mb-1">Global Inventory</p>
<p class="font-body-md text-body-md text-on-surface-variant text-sm">Units available across all nodes</p>
</div>
<div class="flex items-center bg-surface-container-highest rounded-DEFAULT border border-outline-variant/30 overflow-hidden">
<button class="w-10 h-10 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-white/5 transition-colors">
<span class="material-symbols-outlined">remove</span>
</button>
<input class="w-20 h-10 bg-transparent border-none text-center font-button text-button text-primary focus:ring-0" type="text" value="4,092"/>
<button class="w-10 h-10 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-white/5 transition-colors">
<span class="material-symbols-outlined">add</span>
</button>
</div>
</div>
</div>
<!-- Secondary Images Grid -->
<div class="grid grid-cols-2 gap-4">
<div class="relative w-full aspect-video rounded-lg border border-outline-variant/30 bg-surface/5 backdrop-blur-sm overflow-hidden group cursor-pointer">
<img alt="" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition-opacity" src="https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp"/>
<div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-background/50 backdrop-blur-sm">
<span class="material-symbols-outlined text-primary">edit</span>
</div>
</div>
<div class="relative w-full aspect-video rounded-lg border border-outline-variant/30 bg-surface/5 backdrop-blur-sm overflow-hidden flex items-center justify-center border-dashed cursor-pointer hover:border-primary-fixed-dim/50 hover:bg-primary-fixed-dim/5 transition-all">
<div class="flex flex-col items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined">add_photo_alternate</span>
<span class="font-label-caps text-label-caps">Add Asset</span>
</div>
</div>
</div>
</div>
<!-- Right Column: Editable Form & JSON Specs (7 cols) -->
<div class="col-span-1 lg:col-span-7 flex flex-col gap-gutter">
<!-- Basic Info Form -->
<div class="rounded-xl border border-outline-variant/30 bg-surface/5 backdrop-blur-xl p-8 relative">
<!-- Refractive Divider Top -->
<div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-primary-fixed-dim/30 to-transparent"></div>
<h2 class="font-h2 text-h2 text-primary mb-8">Core Attributes</h2>
<div class="space-y-6">
<!-- Input Group: Name -->
<div class="relative">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 uppercase tracking-wider">Designation</label>
<input class="w-full bg-transparent border-0 border-b border-primary-fixed-dim text-primary font-body-lg text-body-lg px-0 py-2 focus:ring-0 focus:border-primary-fixed-dim focus:bg-white/[0.02] transition-colors shadow-[0_1px_0_rgba(0,221,221,0.2)]" type="text" value="Axiom Quantum Edge X"/>
</div>
<div class="grid grid-cols-2 gap-6">
<!-- Input Group: SKU -->
<div class="relative">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 uppercase tracking-wider">SKU Core</label>
<input class="w-full bg-transparent border-0 border-b border-primary-fixed-dim text-primary font-body-lg text-body-lg px-0 py-2 focus:ring-0 focus:border-primary-fixed-dim focus:bg-white/[0.02] transition-colors" type="text" value="AQE-X-992-BLK"/>
</div>
<!-- Input Group: Price -->
<div class="relative">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 uppercase tracking-wider">Base Value (Cr)</label>
<div class="relative">
<span class="absolute left-0 top-2 text-primary-fixed-dim font-body-lg">§</span>
<input class="w-full bg-transparent border-0 border-b border-primary-fixed-dim text-primary font-body-lg text-body-lg pl-6 py-2 focus:ring-0 focus:border-primary-fixed-dim focus:bg-white/[0.02] transition-colors" type="text" value="12,500.00"/>
</div>
</div>
</div>
<!-- Input Group: Description -->
<div class="relative mt-8">
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2 uppercase tracking-wider">Technical Summary</label>
<textarea class="w-full bg-surface-container-highest/50 border border-outline-variant/30 rounded-DEFAULT text-on-surface font-body-md text-body-md p-4 focus:ring-1 focus:ring-primary-fixed-dim focus:border-primary-fixed-dim transition-colors resize-none placeholder-on-surface-variant/50" rows="4">Next-generation quantum processing unit designed for edge-computing environments. Features anomalous heat dissipation mechanisms and non-Euclidean data structuring capabilities. Standard warranty void if exposed to tachyon fields.</textarea>
</div>
</div>
</div>
<!-- JSON Meta Editor Panel -->
<div class="rounded-xl border border-outline-variant/30 bg-[#0a0a0a] backdrop-blur-xl flex flex-col h-[500px] overflow-hidden relative shadow-[0_0_20px_rgba(0,0,0,0.5)]">
<!-- Toolbar -->
<div class="bg-surface-container/80 border-b border-outline-variant/20 px-4 py-3 flex items-center justify-between z-10">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary-fixed-dim text-sm">code</span>
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest">product_meta.json</span>
</div>
<div class="flex gap-2">
<button class="px-3 py-1 rounded bg-white/5 hover:bg-white/10 border border-outline-variant/20 font-label-caps text-label-caps text-on-surface-variant transition-colors">Format</button>
<button class="px-3 py-1 rounded bg-primary-fixed-dim/10 hover:bg-primary-fixed-dim/20 border border-primary-fixed-dim/30 font-label-caps text-label-caps text-primary-fixed-dim transition-colors">Validate</button>
</div>
</div>
<!-- Editor Area (Mocked with textarea for UI purposes, stylized to look like a code editor) -->
<div class="relative flex-grow flex">
<!-- Line Numbers -->
<div class="w-12 bg-surface-container-lowest border-r border-outline-variant/10 text-right py-4 px-2 font-mono text-sm text-on-surface-variant/40 select-none hidden sm:block">
                        1<br/>2<br/>3<br/>4<br/>5<br/>6<br/>7<br/>8<br/>9<br/>10<br/>11<br/>12<br/>13<br/>14<br/>15<br/>16<br/>17<br/>18<br/>19<br/>20
                    </div>
<!-- Code Content -->
<textarea class="flex-grow bg-transparent border-none text-on-surface font-mono text-sm p-4 focus:ring-0 resize-none json-scroll" spellcheck="false">{
  "specifications": {
    "architecture": "Quantum-Core v4",
    "qbits": 1024,
    "coherence_time": "12.5ms",
    "cooling_sys": "Liquid Helium Micro-channels",
    "interface": "Neuro-optic uplink"
  },
  "materials": [
    "Carbyne shell",
    "Graphene heat sinks",
    "Synthetic diamond lenses"
  ],
  "compatibility": {
    "neural_link": "v2.0+",
    "power_grid": "Class A High-Yield",
    "os": ["NeonOS", "ArchAngel", "VoidLinux"]
  },
  "compliance": {
    "cybernetics_board": true,
    "radiation_shielding": "Grade Alpha",
    "safety_override": false
  }
}</textarea>
</div>
<!-- Status Bar -->
<div class="bg-surface-container/50 border-t border-outline-variant/20 px-4 py-1 flex justify-between items-center text-[10px] font-mono text-on-surface-variant/60">
<span>UTF-8</span>
<span class="flex items-center gap-1 text-primary-fixed-dim"><span class="w-2 h-2 rounded-full bg-primary-fixed-dim inline-block"></span> Valid JSON</span>
</div>
</div>
<!-- Category & Tagging Bento Box -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<!-- Categories -->
<div class="rounded-xl border border-outline-variant/30 bg-surface/5 backdrop-blur-md p-6">
<h3 class="font-h3 text-h3 text-primary mb-4 flex items-center gap-2 text-sm">
<span class="material-symbols-outlined text-on-surface-variant text-sm">category</span>
                        Taxonomy
                    </h3>
<select class="w-full bg-surface-container-highest border border-outline-variant/30 text-on-surface font-body-md rounded-DEFAULT p-3 mb-4 focus:ring-1 focus:ring-primary-fixed-dim focus:border-primary-fixed-dim outline-none appearance-none cursor-pointer">
<option>Processing Units &gt; Quantum</option>
<option>Processing Units &gt; Standard</option>
<option>Implants &gt; Neural</option>
<option>Accessories</option>
</select>
<select class="w-full bg-surface-container-highest border border-outline-variant/30 text-on-surface font-body-md rounded-DEFAULT p-3 focus:ring-1 focus:ring-primary-fixed-dim focus:border-primary-fixed-dim outline-none appearance-none cursor-pointer">
<option>Manufacturer: Axiom</option>
<option>Manufacturer: Kiroshi</option>
<option>Manufacturer: Militech</option>
</select>
</div>
<!-- Tags -->
<div class="rounded-xl border border-outline-variant/30 bg-surface/5 backdrop-blur-md p-6">
<h3 class="font-h3 text-h3 text-primary mb-4 flex items-center gap-2 text-sm">
<span class="material-symbols-outlined text-on-surface-variant text-sm">sell</span>
                        Meta Tags
                    </h3>
<div class="flex flex-wrap gap-2 mb-4">
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary-container/20 border border-secondary-fixed-dim/30 text-secondary-fixed-dim font-label-caps text-label-caps uppercase">
                            Premium <span class="material-symbols-outlined text-[10px] cursor-pointer hover:text-white">close</span>
</span>
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary-container/20 border border-secondary-fixed-dim/30 text-secondary-fixed-dim font-label-caps text-label-caps uppercase">
                            Quantum <span class="material-symbols-outlined text-[10px] cursor-pointer hover:text-white">close</span>
</span>
<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary-container/20 border border-secondary-fixed-dim/30 text-secondary-fixed-dim font-label-caps text-label-caps uppercase">
                            Restricted <span class="material-symbols-outlined text-[10px] cursor-pointer hover:text-white">close</span>
</span>
</div>
<div class="relative">
<input class="w-full bg-transparent border-0 border-b border-outline-variant text-primary font-body-sm px-0 py-1 focus:ring-0 focus:border-primary-fixed-dim transition-colors placeholder-on-surface-variant/30" placeholder="Add new tag..." type="text"/>
<button class="absolute right-0 top-1 text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-sm">add_circle</span>
</button>
</div>
</div>
</div>
</div>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
