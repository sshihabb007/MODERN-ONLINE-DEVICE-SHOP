const CACHE_NAME = 'axiom-cache-v2';
const urlsToCache = [
  '/webPhp/NeonGlassAxiom/index.php',
  '/webPhp/NeonGlassAxiom/products.php',
  '/webPhp/NeonGlassAxiom/checkout.php',
  '/webPhp/NeonGlassAxiom/profile.php',
  '/webPhp/NeonGlassAxiom/manifest.json',
  '/webPhp/NeonGlassAxiom/icon-192x192.png',
  '/webPhp/NeonGlassAxiom/icon-512x512.png'
];

self.addEventListener('install', event => {
  self.skipWaiting();
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(clients.claim());
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Network First, falling back to cache strategy for dynamic PHP sites
self.addEventListener('fetch', event => {
  // Ignore non-GET requests (like POST for login)
  if (event.request.method !== 'GET') return;

  event.respondWith(
    fetch(event.request)
      .then(response => {
        // If network works, clone the response and update the cache
        const responseClone = response.clone();
        caches.open(CACHE_NAME).then(cache => {
          cache.put(event.request, responseClone);
        });
        return response;
      })
      .catch(() => {
        // If network fails, serve from cache
        return caches.match(event.request);
      })
  );
});
