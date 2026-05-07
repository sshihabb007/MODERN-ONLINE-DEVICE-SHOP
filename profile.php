<?php
include 'includes/mehedi_header.php';
include_once 'includes/shihab_security.php';
$csrf_token = sshihabb007_generate_csrf();
?>
<main class="pt-[120px] pb-[120px] md:pb-margin max-w-container-max mx-auto px-margin flex-grow">
<?php if (isset($_SESSION['auth_error'])): ?>
    <div class="bg-error-container text-on-error-container p-4 rounded-xl mb-6">
        <?php echo $_SESSION['auth_error']; unset($_SESSION['auth_error']); ?>
    </div>
<?php endif; ?>

<?php if (!isset($_SESSION['sshihabb007_user_id'])): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter max-w-4xl mx-auto">
        <!-- Login Form -->
        <div class="glass-panel p-stack-md rounded-xl">
            <h2 class="font-h2 text-h2 text-primary mb-stack-md">System Authentication</h2>
            <form action="shihab_auth_action.php" method="POST" class="space-y-stack-sm">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <input type="hidden" name="action" value="login">
                <div>
                    <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Username</label>
                    <input name="username" class="cyber-input w-full p-2 text-primary font-body-md" required type="text"/>
                </div>
                <div>
                    <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Passcode</label>
                    <input name="password" class="cyber-input w-full p-2 text-primary font-body-md" required type="password"/>
                </div>
                <button type="submit" class="ghost-button w-full py-stack-sm rounded-lg font-button text-button text-primary-fixed-dim uppercase mt-stack-md">
                    Initiate Handshake
                </button>
            </form>
        </div>

        <!-- Register Form -->
        <div class="glass-modal p-stack-md rounded-xl border border-secondary-container/50">
            <h2 class="font-h2 text-h2 text-primary mb-stack-md">New Operative</h2>
            <form action="shihab_auth_action.php" method="POST" class="space-y-stack-sm">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <input type="hidden" name="action" value="register">
                <div>
                    <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Username</label>
                    <input name="username" class="cyber-input w-full p-2 text-primary font-body-md border-secondary-container/50 focus:border-secondary-container" required type="text"/>
                </div>
                <div>
                    <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Email</label>
                    <input name="email" class="cyber-input w-full p-2 text-primary font-body-md border-secondary-container/50 focus:border-secondary-container" required type="email"/>
                </div>
                <div>
                    <label class="font-label-caps text-label-caps text-on-surface-variant block mb-unit">Passcode</label>
                    <input name="password" class="cyber-input w-full p-2 text-primary font-body-md border-secondary-container/50 focus:border-secondary-container" required type="password"/>
                </div>
                <button type="submit" class="ghost-button border-secondary-container text-secondary-fixed-dim hover:border-secondary-fixed hover:text-primary hover:bg-secondary-container/20 w-full py-stack-sm rounded-lg font-button text-button uppercase mt-stack-md">
                    Request Clearance
                </button>
            </form>
        </div>
    </div>
<?php else: ?>
    <!-- Admin Controls -->
    <?php if (isset($_SESSION['sshihabb007_role']) && $_SESSION['sshihabb007_role'] === 'admin'): ?>
        <div class="mb-stack-md flex gap-4">
            <a href="admin-add.php" class="bg-error-container text-on-error-container px-4 py-2 rounded font-button text-button">Admin Dashboard</a>
        </div>
    <?php endif; ?>
    <!-- Logout -->
    <div class="mb-stack-lg">
        <form action="shihab_auth_action.php" method="POST">
            <input type="hidden" name="action" value="logout">
            <button type="submit" class="ghost-button px-4 py-2 rounded font-button text-button text-error">Sever Connection (Logout)</button>
        </form>
    </div>

    <!-- Hero Section -->
    <section class="mb-24 flex flex-col md:flex-row gap-stack-lg items-center mt-12">
    <div class="flex-1 space-y-stack-md z-10">
    <div class="inline-block px-4 py-1 rounded-full bg-secondary-container/20 text-secondary-fixed-dim font-label-caps text-label-caps border border-secondary-container/50">
                        System Architecture
                    </div>
    <h1 class="font-display text-display text-primary text-glow">Mehedi Hasan Shihab</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                        Senior Software Engineer &amp; Full-Stack Developer. Forging high-fidelity digital infrastructure and engineering the future of elite e-commerce systems.
                    </p>
    <div class="flex gap-stack-sm pt-4">
    <button class="glass-panel font-button text-button text-primary-fixed-dim border-primary-fixed-dim px-6 py-3 rounded-lg hover:bg-gradient-to-r hover:from-primary-fixed-dim hover:to-secondary-container hover:text-primary hover:border-transparent transition-all duration-300 flex items-center gap-2 hover-glow">
    <span class="material-symbols-outlined text-[18px]">terminal</span>
                            View GitHub Matrix
                        </button>
    <button class="glass-panel border-transparent font-button text-button text-primary px-6 py-3 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-2">
    <span class="material-symbols-outlined text-[18px]">hub</span>
                            LinkedIn Network
                        </button>
    </div>
    </div>
    <div class="w-full md:w-1/3 relative z-10">
    <div class="glass-modal p-2 rounded-2xl relative group overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary-fixed-dim/10 to-secondary-container/10 opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
    <img alt="Mehedi Hasan Shihab Profile" class="w-full aspect-[3/4] object-cover rounded-xl filter grayscale contrast-125 brightness-90 group-hover:grayscale-0 transition-all duration-700" src="https://lh3.googleusercontent.com/aida/ADBb0ugk-pMYOtUug_Kw9aHQkB6-rtrKqXwkoaGdpZifpNfWZHWHp72LV8Lx03a8IoOD__27z_-TyQOdIBNufxjKRz69Eq2ElUsMS2oP0cBh4ZhR6dsIG913ltYs_eTUvzpin3I2Jw5eYA3LQ-HSyJqvtP0OA8q6iv5KCa__uYfacBNf-yZAoatvJ1cPCyQtM-deAfEnpauaLNpGGLT-GePBHJbq-j8qBl-SUvS6O1RBEQDaW7eYy8rcw0iWHjL3"/>
    <div class="absolute bottom-6 left-6 glass-panel px-4 py-2 rounded-lg border-l-2 border-l-primary-fixed-dim flex items-center gap-2">
    <span class="w-2 h-2 rounded-full bg-primary-fixed-dim animate-pulse"></span>
    <span class="font-label-caps text-label-caps text-primary">System Online</span>
    </div>
    </div>
    <!-- Ambient Glow Behind Image -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-primary-fixed-dim/20 blur-[80px] -z-10 rounded-full pointer-events-none"></div>
    </div>
    </section>
    <div class="refractive-divider mb-24"></div>
    <!-- The Mission -->
    <section class="mb-24 relative">
    <!-- Decorative Background Image -->
    <div class="absolute -right-24 top-0 w-1/2 h-full opacity-10 pointer-events-none -z-10">
    <img alt="Abstract Tech Background" class="w-full h-full object-cover rounded-3xl mix-blend-screen filter blur-sm" src="https://mcsolution.com.bd/wp-content/uploads/2024/08/Google-Pixel-9-2024-Obsidian-Price-in-Bangladesh-MC-Solution-BD-1200x900.webp"/>
    </div>
    <div class="max-w-3xl">
    <h2 class="font-h2 text-h2 text-primary mb-stack-md flex items-center gap-4">
    <span class="material-symbols-outlined text-primary-fixed-dim">radar</span>
                        The Mission
                    </h2>
    <div class="glass-panel p-8 rounded-xl border-l-4 border-l-secondary-container relative overflow-hidden">
    <div class="absolute top-0 right-0 p-4 opacity-20">
    <span class="material-symbols-outlined text-[120px] leading-none text-primary-fixed-dim">api</span>
    </div>
    <p class="font-body-lg text-body-lg text-on-surface-variant relative z-10">
                            Architecting robust, scalable backends and immersive front-end experiences. The focus is on bridging complex data models with intuitive, high-performance user interfaces. It's not just about writing code; it's about constructing a flawless digital ecosystem where security, speed, and elegance converge.
                        </p>
    </div>
    </div>
    </section>
    <!-- Technical Proficiencies (Bento Grid) -->
    <section class="mb-24">
    <h2 class="font-h2 text-h2 text-primary mb-stack-md flex items-center gap-4">
    <span class="material-symbols-outlined text-primary-fixed-dim">memory</span>
                    Technical Proficiencies
                </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-md">
    <!-- Node 1 -->
    <div class="glass-panel p-6 rounded-xl hover-glow transition-all duration-300 group">
    <div class="flex justify-between items-start mb-4">
    <span class="material-symbols-outlined text-primary-fixed-dim text-[32px] group-hover:scale-110 transition-transform">code_blocks</span>
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim bg-secondary-container/20 px-2 py-1 rounded">Front-End Core</span>
    </div>
    <h3 class="font-h3 text-h3 text-primary mb-2">React.js Ecosystem</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">Building dynamic, responsive interfaces with precise state management and component-driven architecture.</p>
    </div>
    <!-- Node 2 -->
    <div class="glass-panel p-6 rounded-xl hover-glow transition-all duration-300 group md:col-span-2 relative overflow-hidden">
    <img alt="Server Infrastructure Abstract" class="absolute inset-0 w-full h-full object-cover opacity-10 mix-blend-luminosity" src="https://lh3.googleusercontent.com/aida/ADBb0ugshtVEcZ8K8aYHuxXvvo9emkZ2p7VREC1bIiov8Pr7PSVLXhNt2JnRlcCghHMKr-ReUI54eSlX60qyy1Q7ziGT9PQnngHG0K0dVgH79A7xQ0hM6G5FsogrnAoYgeGeXEenheeGCj9pgFulC5zFd6sgrfl9KMKuOjs6MCxO1mR_wxYraheCGaBG39SAYXjuDbR3iUoo-dOWJ0PKv3GobdtSwOcllThiNfGJQH_dcdoyBLGZjI5hRVkvU8M"/>
    <div class="relative z-10">
    <div class="flex justify-between items-start mb-4">
    <span class="material-symbols-outlined text-primary-fixed-dim text-[32px] group-hover:scale-110 transition-transform">dns</span>
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim bg-secondary-container/20 px-2 py-1 rounded">Backend &amp; DB</span>
    </div>
    <h3 class="font-h3 text-h3 text-primary mb-2">Node.js &amp; PHP Infrastructure</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">Designing scalable RESTful APIs and robust data pipelines to power heavy-load applications securely.</p>
    </div>
    </div>
    <!-- Node 3 -->
    <div class="glass-panel p-6 rounded-xl hover-glow transition-all duration-300 group md:col-span-2 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-primary-fixed-dim/5"></div>
    <div class="relative z-10">
    <div class="flex justify-between items-start mb-4">
    <span class="material-symbols-outlined text-primary-fixed-dim text-[32px] group-hover:scale-110 transition-transform">smart_toy</span>
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim bg-secondary-container/20 px-2 py-1 rounded">Intelligence</span>
    </div>
    <h3 class="font-h3 text-h3 text-primary mb-2">AI / Machine Learning Integration</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">Implementing advanced algorithms to create adaptive, intelligent systems that evolve with user interaction.</p>
    </div>
    </div>
    <!-- Node 4 -->
    <div class="glass-panel p-6 rounded-xl hover-glow transition-all duration-300 group">
    <div class="flex justify-between items-start mb-4">
    <span class="material-symbols-outlined text-primary-fixed-dim text-[32px] group-hover:scale-110 transition-transform">cloud_sync</span>
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim bg-secondary-container/20 px-2 py-1 rounded">Deployment</span>
    </div>
    <h3 class="font-h3 text-h3 text-primary mb-2">Cloud Operations</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">Ensuring high availability and seamless CI/CD pipelines across distributed environments.</p>
    </div>
    </div>
    </section>
    <div class="refractive-divider mb-24"></div>
    <!-- The Vault's History (Projects) -->
    <section class="mb-24">
    <h2 class="font-h2 text-h2 text-primary mb-stack-lg flex items-center gap-4">
    <span class="material-symbols-outlined text-primary-fixed-dim">history_toggle_off</span>
                    The Vault's Archives
                </h2>
    <div class="space-y-stack-md relative before:content-[''] before:absolute before:left-8 before:top-0 before:bottom-0 before:w-[1px] before:bg-outline-variant/30">
    <!-- Project 1 -->
    <div class="relative pl-24 group">
    <div class="absolute left-[28px] top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-surface border-2 border-primary-fixed-dim z-10 group-hover:bg-primary-fixed-dim transition-colors shadow-[0_0_10px_rgba(0,221,221,0.5)]"></div>
    <div class="glass-panel p-6 rounded-xl group-hover:border-primary-fixed-dim/50 transition-colors flex flex-col md:flex-row gap-stack-md items-center">
    <div class="flex-1">
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim mb-2 block">Alpha Protocol</span>
    <h3 class="font-h3 text-h3 text-primary mb-2">AI English Test Assistance</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">An intelligent platform utilizing NLP to evaluate and enhance language proficiency in real-time.</p>
    </div>
    <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden relative">
    <img alt="AI Interface Snapshot" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition-all duration-500" src="https://lh3.googleusercontent.com/aida/ADBb0ugIPenP46UGWNl0caGNtH_wV2JSmvVkz6Dw4qtoW4or0gFqFqKnWVp289ZQs4vdoCtcl06yCLa8o29ODTTz8nPhDleAbGlogSUNESaE24qdCYNhoS08ZOwi4WwTaGcRN5QrEYYvcwxlXUmuQtb8sMPJI-eqYlWMbeKpIyvxxn178pNCl-PnSSV0mtRVhfQbkWTvvJZfXUiPGwtnGKVWDA4EezFHQdDjvnYl5JpRnjmz5jBK72UyFBEfsJAX"/>
    <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent opacity-60"></div>
    </div>
    </div>
    </div>
    <!-- Project 2 -->
    <div class="relative pl-24 group">
    <div class="absolute left-[28px] top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-surface border-2 border-primary-fixed-dim z-10 group-hover:bg-primary-fixed-dim transition-colors shadow-[0_0_10px_rgba(0,221,221,0.5)]"></div>
    <div class="glass-panel p-6 rounded-xl group-hover:border-primary-fixed-dim/50 transition-colors flex flex-col md:flex-row gap-stack-md items-center">
    <div class="flex-1">
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim mb-2 block">Beta Node</span>
    <h3 class="font-h3 text-h3 text-primary mb-2">Hospital Management System</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">A comprehensive administrative backend designed for secure patient data handling and resource optimization.</p>
    </div>
    </div>
    </div>
    <!-- Project 3 -->
    <div class="relative pl-24 group">
    <div class="absolute left-[28px] top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-surface border-2 border-primary-fixed-dim z-10 group-hover:bg-primary-fixed-dim transition-colors shadow-[0_0_10px_rgba(0,221,221,0.5)]"></div>
    <div class="glass-panel p-6 rounded-xl group-hover:border-primary-fixed-dim/50 transition-colors flex flex-col md:flex-row gap-stack-md items-center">
    <div class="flex-1">
    <span class="font-label-caps text-label-caps text-secondary-fixed-dim mb-2 block">Gamma Sector</span>
    <h3 class="font-h3 text-h3 text-primary mb-2">Online Smartphone Shop</h3>
    <p class="font-body-md text-body-md text-on-surface-variant">A high-conversion e-commerce platform featuring dynamic inventory tracking and secure payment gateways.</p>
    </div>
    <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden relative">
    <img alt="E-Commerce Interface Snapshot" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition-all duration-500" src="https://lh3.googleusercontent.com/aida/ADBb0uhN5co7EVf8fG4cOFcIhlib4jylCSOEDMumrGYrli0OThj3EfZo-qqnWg1WAFNS03Rr7o8vL8UyF1YayXr3X1WAUPVd_dooqOnI3M7hcwQnHNEJ1Hc9klSSrUUuoyij5nmPise9Vmrnt9lk7DTWnXgXrnqJkm8bKP0qqGNI-uRCQoujd4LxGpXFy8uXwLyfQ3sayta8ZcZDmk7UoHJGFztUKqgs_ccauT0xDFbjTK4bT4t4wQaeimZ0CL6y"/>
    <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent opacity-60"></div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- Connection Request Section (Decorative Loader) -->
    <section class="mt-32 max-w-lg mx-auto text-center">
    <h3 class="font-label-caps text-label-caps text-primary-fixed-dim mb-4 tracking-widest uppercase">Initiate Connection Sequence</h3>
    <!-- Glitch Loader Simulation -->
    <div class="h-1 w-full bg-surface-variant rounded-full overflow-hidden mb-8 relative">
    <div class="absolute top-0 left-0 h-full w-1/3 bg-primary-fixed-dim animate-[pulse_2s_ease-in-out_infinite] shadow-[0_0_10px_rgba(0,221,221,0.8)]"></div>
    <div class="absolute top-0 left-1/2 h-full w-1/4 bg-secondary-container animate-[pulse_3s_ease-in-out_infinite] shadow-[0_0_10px_rgba(107,19,175,0.8)] mix-blend-screen"></div>
    </div>
    <p class="font-body-md text-body-md text-on-surface-variant mb-6">Awaiting handshake protocol from external client.</p>
    </section>

<?php endif; ?>
</main>
<?php include 'includes/sshihabb007_footer.php'; ?>
