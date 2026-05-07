<footer class="border-t border-outline-variant/30 bg-surface-container/20 py-8 px-gutter text-center text-on-surface-variant font-body-md mt-auto relative z-10">
    <div class="max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
        <div>&copy; 2026 Neon-Glass Axiom. All rights reserved.</div>
        <div class="flex gap-4">
            <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-primary transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>

<script>
    // PWA Service Worker Registration
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('sw.js')
                .then(registration => {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                })
                .catch(err => {
                    console.log('ServiceWorker registration failed: ', err);
                });
        });
    }
</script>

</body>
</html>
