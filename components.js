class TopAppBar extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
<header class="fixed top-unit w-[calc(100%-48px)] left-margin right-margin rounded-xl border border-outline-variant/30 bg-surface/10 backdrop-blur-md backdrop-blur-xl border border-outline-variant/20 shadow-[0_0_15px_rgba(0,221,221,0.1)] flex justify-between items-center px-gutter py-unit h-16 z-50 hidden md:flex">
<div class="flex items-center">
<span class="font-display text-h3 font-bold tracking-tighter text-primary dark:text-primary">Neon-Glass Axiom</span>
</div>
<nav class="hidden lg:flex items-center gap-gutter font-body-md text-body-md" id="desktop-nav">
<a class="text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary transition-all duration-300" href="index.html">Home</a>
<a class="text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary transition-all duration-300" href="products.html">Explore</a>
<a class="text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary transition-all duration-300" href="checkout.html">Cart</a>
<a class="text-on-surface-variant hover:border-primary-fixed-dim hover:text-primary transition-all duration-300" href="profile.html">Profile</a>
</nav>
<div class="flex items-center gap-stack-sm">
<div class="relative group hidden sm:block">
<input class="bg-transparent border-b border-primary-fixed-dim text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:border-primary-fixed-dim focus:ring-0 focus:shadow-[0_0_8px_rgba(0,221,221,0.5)] transition-shadow w-48 font-body-md text-body-md py-1" placeholder="Search..." type="text"/>
<span class="material-symbols-outlined absolute right-0 top-1 text-primary-fixed-dim">search</span>
</div>
<button class="p-2 text-primary hover:text-primary-fixed-dim transition-colors group">
<span class="material-symbols-outlined group-active:scale-95 duration-150 transition-transform">shopping_cart</span>
</button>
<button class="p-2 text-primary hover:text-primary-fixed-dim transition-colors group">
<span class="material-symbols-outlined group-active:scale-95 duration-150 transition-transform">account_circle</span>
</button>
</div>
</header>
        `;

        const currentPath = window.location.pathname.split('/').pop() || 'index.html';
        const links = this.querySelectorAll('#desktop-nav a');
        links.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.remove('text-on-surface-variant');
                link.classList.add('text-primary', 'border-b-2', 'border-primary-fixed-dim');
            }
        });
    }
}

class BottomNavBar extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
<nav class="fixed bottom-6 left-1/2 -translate-x-1/2 flex gap-stack-md items-center p-2 z-50 bg-surface-container/20 backdrop-blur-lg w-max px-stack-lg rounded-full border border-outline-variant/50 backdrop-blur-2xl border border-outline-variant/40 shadow-[0_-4px_20px_rgba(107,19,175,0.2)] md:hidden" id="mobile-nav">
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="index.html">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
<span class="font-label-caps text-label-caps mt-1">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="products.html">
<span class="material-symbols-outlined">grid_view</span>
<span class="font-label-caps text-label-caps mt-1">Explore</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="checkout.html">
<span class="material-symbols-outlined">shopping_bag</span>
<span class="font-label-caps text-label-caps mt-1">Cart</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant/70 p-2 hover:text-primary hover:bg-white/5 transition-all active:scale-90 duration-200" href="profile.html">
<span class="material-symbols-outlined">person</span>
<span class="font-label-caps text-label-caps mt-1">Profile</span>
</a>
</nav>
        `;

        const currentPath = window.location.pathname.split('/').pop() || 'index.html';
        const links = this.querySelectorAll('#mobile-nav a');
        links.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.remove('text-on-surface-variant/70');
                link.classList.add('text-primary-fixed-dim', 'bg-secondary-container/40', 'rounded-full');
            }
        });
    }
}

class AppFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
<footer class="border-t border-outline-variant/30 bg-surface-container/20 py-8 px-gutter text-center text-on-surface-variant font-body-md mt-auto relative z-10">
    <div class="max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
        <div>&copy; 2026 Neon-Glass Axiom. All rights reserved.</div>
        <div class="flex gap-4">
            <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-primary transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>
        `;
    }
}

customElements.define('top-app-bar', TopAppBar);
customElements.define('bottom-nav-bar', BottomNavBar);
customElements.define('app-footer', AppFooter);
