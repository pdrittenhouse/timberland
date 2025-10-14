/**
 * Service Worker
 *
 * Implements caching strategies for different asset types:
 * - Precaching: Critical assets that should always be available
 * - Cache-first: Images, fonts, and other static assets
 * - Network-first: HTML pages and API responses
 * - Stale-while-revalidate: CSS and JavaScript
 *
 * @package Timberland
 */

import { precacheAndRoute } from 'workbox-precaching';
import { registerRoute } from 'workbox-routing';
import { CacheFirst, NetworkFirst, StaleWhileRevalidate } from 'workbox-strategies';
import { ExpirationPlugin } from 'workbox-expiration';

// Precache critical assets (will be populated by webpack InjectManifest)
console.log('[SW] Installing service worker...');
const manifest = self.__WB_MANIFEST;
console.log('[SW] Precaching', manifest.length, 'assets');
precacheAndRoute(manifest);

// Log when service worker is activated
self.addEventListener('activate', event => {
  console.log('[SW] Service worker activated');
});

// Cache images with Cache-First strategy
registerRoute(
  ({ request }) => request.destination === 'image',
  new CacheFirst({
    cacheName: 'dream-images',
    plugins: [
      new ExpirationPlugin({
        maxEntries: 60,
        maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
      }),
      {
        cacheDidUpdate: async ({ cacheName, request }) => {
          console.log(`[SW] Cached image: ${request.url}`);
        },
      },
    ],
  })
);

// Cache CSS and JavaScript with Stale-While-Revalidate
registerRoute(
  ({ request }) => request.destination === 'style' || request.destination === 'script',
  new StaleWhileRevalidate({
    cacheName: 'dream-assets',
  })
);

// Cache fonts with Cache-First strategy (they rarely change)
registerRoute(
  ({ request }) => request.destination === 'font',
  new CacheFirst({
    cacheName: 'dream-fonts',
    plugins: [
      new ExpirationPlugin({
        maxEntries: 30,
        maxAgeSeconds: 365 * 24 * 60 * 60, // 1 Year
      }),
    ],
  })
);

// Cache Google Fonts stylesheets
registerRoute(
  ({ url }) => url.origin === 'https://fonts.googleapis.com',
  new StaleWhileRevalidate({
    cacheName: 'google-fonts-stylesheets',
  })
);

// Cache Google Fonts webfonts
registerRoute(
  ({ url }) => url.origin === 'https://fonts.gstatic.com',
  new CacheFirst({
    cacheName: 'google-fonts-webfonts',
    plugins: [
      new ExpirationPlugin({
        maxEntries: 30,
        maxAgeSeconds: 365 * 24 * 60 * 60, // 1 Year
      }),
    ],
  })
);

// Cache WordPress REST API responses with Network-First
registerRoute(
  ({ url }) => url.pathname.startsWith('/wp-json/'),
  new NetworkFirst({
    cacheName: 'dream-api',
    plugins: [
      new ExpirationPlugin({
        maxEntries: 50,
        maxAgeSeconds: 5 * 60, // 5 Minutes
      }),
    ],
  })
);

// Cache HTML pages with Network-First (always try network, fallback to cache)
registerRoute(
  ({ request }) => request.mode === 'navigate',
  new NetworkFirst({
    cacheName: 'dream-pages',
    plugins: [
      new ExpirationPlugin({
        maxEntries: 50,
        maxAgeSeconds: 24 * 60 * 60, // 24 Hours
      }),
    ],
  })
);
