<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Neon-Glass Axiom</title>
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/webPhp/NeonGlassAxiom/manifest.json">
    <meta name="theme-color" content="#061422">
    <link rel="apple-touch-icon" href="/webPhp/NeonGlassAxiom/icon-192x192.png">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-on-surface": "#243240",
                    "secondary-container": "#6b13af",
                    "inverse-surface": "#d6e4f7",
                    "primary-fixed-dim": "#00dddd",
                    "on-primary-container": "#007070",
                    "on-primary-fixed-variant": "#004f4f",
                    "tertiary": "#ffffff",
                    "outline": "#839493",
                    "tertiary-fixed-dim": "#c8c6c5",
                    "error-container": "#93000a",
                    "surface-container-lowest": "#020f1c",
                    "secondary-fixed": "#f1dbff",
                    "surface-tint": "#00dddd",
                    "surface-container": "#13212e",
                    "on-primary": "#003737",
                    "tertiary-container": "#e5e2e1",
                    "on-primary-fixed": "#002020",
                    "surface-dim": "#061422",
                    "secondary": "#deb7ff",
                    "on-surface-variant": "#b9cac9",
                    "surface": "#061422",
                    "on-tertiary": "#313030",
                    "tertiary-fixed": "#e5e2e1",
                    "surface-container-high": "#1e2b39",
                    "on-secondary": "#4a007f",
                    "surface-container-highest": "#293644",
                    "primary": "#ffffff",
                    "surface-variant": "#293644",
                    "on-tertiary-fixed": "#1c1b1b",
                    "on-secondary-container": "#d4a5ff",
                    "primary-fixed": "#00fbfb",
                    "on-background": "#d6e4f7",
                    "on-error-container": "#ffdad6",
                    "primary-container": "#00fbfb",
                    "on-secondary-fixed": "#2d0050",
                    "outline-variant": "#3a4a49",
                    "on-tertiary-container": "#656464",
                    "inverse-primary": "#006a6a",
                    "error": "#ffb4ab",
                    "surface-container-low": "#0f1d2a",
                    "surface-bright": "#2d3a49",
                    "on-tertiary-fixed-variant": "#474646",
                    "on-secondary-fixed-variant": "#680eac",
                    "on-surface": "#d6e4f7",
                    "on-error": "#690005",
                    "background": "#061422",
                    "secondary-fixed-dim": "#deb7ff"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "unit": "4px",
                    "gutter": "24px",
                    "container-max": "1440px",
                    "margin": "48px",
                    "stack-sm": "12px",
                    "stack-md": "24px",
                    "stack-lg": "48px"
            },
            "fontFamily": {
                    "h3": ["Space Grotesk"],
                    "label-caps": ["Space Grotesk"],
                    "body-lg": ["Inter"],
                    "h2": ["Space Grotesk"],
                    "display": ["Space Grotesk"],
                    "body-md": ["Inter"],
                    "h1": ["Space Grotesk"],
                    "button": ["Space Grotesk"]
            },
            "fontSize": {
                    "h3": ["24px", { "lineHeight": "1.4", "fontWeight": "500" }],
                    "label-caps": ["12px", { "lineHeight": "1", "letterSpacing": "0.1em", "fontWeight": "700" }],
                    "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                    "h2": ["32px", { "lineHeight": "1.3", "fontWeight": "600" }],
                    "display": ["72px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                    "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                    "h1": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                    "button": ["14px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }]
            }
          }
        }
      }
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 221, 221, 0.2);
        }
        .glass-modal {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 221, 221, 0.5);
            box-shadow: 0 0 15px rgba(0, 221, 221, 0.1);
        }
        .ghost-button {
            background: transparent;
            border: 1px solid rgba(0, 221, 221, 0.5);
            transition: all 0.3s ease;
        }
        .ghost-button:hover {
            background: linear-gradient(90deg, rgba(0, 221, 221, 0.2) 0%, rgba(107, 19, 175, 0.2) 100%);
            border-color: rgba(0, 221, 221, 1);
            box-shadow: 0 0 15px rgba(0, 221, 221, 0.3);
        }
        .cyber-input {
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 221, 221, 0.5);
            transition: all 0.3s ease;
        }
        .cyber-input:focus {
            outline: none;
            border: 1px solid rgba(0, 221, 221, 0.8);
            box-shadow: 0 0 10px rgba(0, 221, 221, 0.2);
        }
        .cyber-checkbox {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 1px solid rgba(0, 221, 221, 0.5);
            border-radius: 2px;
            background: transparent;
            cursor: pointer;
            position: relative;
        }
        .cyber-checkbox:checked {
            background: rgba(0, 221, 221, 0.2);
            border-color: rgba(0, 221, 221, 1);
        }
        .cyber-checkbox:checked::after {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: 10px;
            height: 10px;
            background: #00dddd;
            border-radius: 1px;
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased selection:bg-primary-fixed-dim selection:text-surface-dim overflow-x-hidden flex flex-col min-h-screen">

<header class="fixed top-unit w-[calc(100%-48px)] left-margin right-margin rounded-xl border border-outline-variant/30 bg-surface/10 backdrop-blur-md backdrop-blur-xl border border-outline-variant/20 shadow-[0_0_15px_rgba(0,221,221,0.1)] flex justify-between items-center px-gutter py-unit h-16 z-50 hidden md:flex">
    <div class="flex items-center">
        <a href="/webPhp/NeonGlassAxiom/index.php" class="font-display text-h3 font-bold tracking-tighter text-primary dark:text-primary">Neon-Glass Axiom</a>
    </div>
    <nav class="hidden lg:flex items-center gap-gutter font-body-md text-body-md" id="desktop-nav">
        <a class="<?= ($current_page == 'index.php') ? 'text-primary border-b-2 border-primary-fixed-dim' : 'text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary' ?> transition-all duration-300" href="/webPhp/NeonGlassAxiom/index.php">Home</a>
        <a class="<?= ($current_page == 'products.php') ? 'text-primary border-b-2 border-primary-fixed-dim' : 'text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary' ?> transition-all duration-300" href="/webPhp/NeonGlassAxiom/pages/products.php">Explore</a>
        <a class="<?= ($current_page == 'checkout.php') ? 'text-primary border-b-2 border-primary-fixed-dim' : 'text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary' ?> transition-all duration-300" href="/webPhp/NeonGlassAxiom/pages/checkout.php">Cart</a>
        <a class="<?= ($current_page == 'profile.php') ? 'text-primary border-b-2 border-primary-fixed-dim' : 'text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary' ?> transition-all duration-300" href="/webPhp/NeonGlassAxiom/pages/profile.php">Profile</a>
    </nav>
    <div class="flex items-center gap-stack-sm">
        <div class="relative group hidden sm:block">
            <input class="bg-transparent border-b border-primary-fixed-dim text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:border-primary-fixed-dim focus:ring-0 focus:shadow-[0_0_8px_rgba(0,221,221,0.5)] transition-shadow w-48 font-body-md text-body-md py-1" placeholder="Search..." type="text"/>
            <span class="material-symbols-outlined absolute right-0 top-1 text-primary-fixed-dim">search</span>
        </div>
        <a href="/webPhp/NeonGlassAxiom/pages/checkout.php" class="p-2 text-primary hover:text-primary-fixed-dim transition-colors group relative">
            <span class="material-symbols-outlined group-active:scale-95 duration-150 transition-transform">shopping_cart</span>
            <?php if(isset($_SESSION['sshihabb007_cart']) && count($_SESSION['sshihabb007_cart']) > 0): ?>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"><?= array_sum($_SESSION['sshihabb007_cart']) ?></span>
            <?php endif; ?>
        </a>
        <a href="/webPhp/NeonGlassAxiom/pages/profile.php" class="p-2 text-primary hover:text-primary-fixed-dim transition-colors group">
            <span class="material-symbols-outlined group-active:scale-95 duration-150 transition-transform">account_circle</span>
        </a>
    </div>
</header>

<nav class="fixed bottom-6 left-1/2 -translate-x-1/2 flex gap-stack-md items-center p-2 z-50 bg-surface-container/20 backdrop-blur-lg w-max px-stack-lg rounded-full border border-outline-variant/50 backdrop-blur-2xl border border-outline-variant/40 shadow-[0_-4px_20px_rgba(107,19,175,0.2)] md:hidden" id="mobile-nav">
    <a class="flex flex-col items-center justify-center <?= ($current_page == 'index.php') ? 'text-primary-fixed-dim bg-secondary-container/40 rounded-full' : 'text-on-surface-variant/70' ?> p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="/webPhp/NeonGlassAxiom/index.php">
        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
        <span class="font-label-caps text-label-caps mt-1">Home</span>
    </a>
    <a class="flex flex-col items-center justify-center <?= ($current_page == 'products.php') ? 'text-primary-fixed-dim bg-secondary-container/40 rounded-full' : 'text-on-surface-variant/70' ?> p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="/webPhp/NeonGlassAxiom/pages/products.php">
        <span class="material-symbols-outlined">grid_view</span>
        <span class="font-label-caps text-label-caps mt-1">Explore</span>
    </a>
    <a class="flex flex-col items-center justify-center <?= ($current_page == 'checkout.php') ? 'text-primary-fixed-dim bg-secondary-container/40 rounded-full' : 'text-on-surface-variant/70' ?> p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="/webPhp/NeonGlassAxiom/pages/checkout.php">
        <span class="material-symbols-outlined">shopping_bag</span>
        <span class="font-label-caps text-label-caps mt-1">Cart</span>
    </a>
    <a class="flex flex-col items-center justify-center <?= ($current_page == 'profile.php') ? 'text-primary-fixed-dim bg-secondary-container/40 rounded-full' : 'text-on-surface-variant/70' ?> p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="/webPhp/NeonGlassAxiom/pages/profile.php">
        <span class="material-symbols-outlined">person</span>
        <span class="font-label-caps text-label-caps mt-1">Profile</span>
    </a>
</nav>
