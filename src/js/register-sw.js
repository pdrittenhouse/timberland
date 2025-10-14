/**
 * Service Worker Registration
 *
 * Registers the service worker and handles updates.
 */

if ('serviceWorker' in navigator) {
  console.log('[SW] Service Worker API is supported');

  window.addEventListener('load', () => {
    console.log('[SW] Page loaded, registering service worker...');

    navigator.serviceWorker
      .register('/wp-content/themes/timberland/sw.js')
      .then(registration => {
        console.log('[SW] ✅ Registration successful!');
        console.log('[SW] Scope:', registration.scope);
        console.log('[SW] Active:', registration.active);
        console.log('[SW] Installing:', registration.installing);
        console.log('[SW] Waiting:', registration.waiting);

        // Check for updates periodically
        setInterval(() => {
          console.log('[SW] Checking for updates...');
          registration.update();
        }, 60 * 60 * 1000); // Check every hour

        // Listen for service worker updates
        registration.addEventListener('updatefound', () => {
          console.log('[SW] Update found!');
        });
      })
      .catch(error => {
        console.error('[SW] ❌ Registration failed:', error);
      });

    // Listen for messages from service worker
    navigator.serviceWorker.addEventListener('message', event => {
      console.log('[SW] Message from service worker:', event.data);
    });

    // Check if service worker is controlling this page
    if (navigator.serviceWorker.controller) {
      console.log('[SW] ✅ Page is controlled by service worker');
    } else {
      console.log('[SW] ⚠️ Page is NOT controlled by service worker (reload may be needed)');
    }
  });
} else {
  console.log('[SW] ❌ Service Worker API is not supported in this browser');
}
