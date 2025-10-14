# Performance Optimization Implementation Plan

**Last Updated:** 2025-10-13
**Status:** Phase 1 Complete, Phase 2 Skipped
**Total Actual Effort:** 2 hours (Phase 1 only)

## Implementation Summary

| Phase | Status | Effort | Outcome |
|-------|--------|--------|---------|
| **Phase 1: Lazy Loading** | ✅ Complete | 2 hours | Improved LCP, working well |
| **Phase 2: Critical CSS** | ⚠️ Skipped | 8+ hours attempted | Not compatible with current architecture |
| **Phase 3: Service Worker** | ⏸️ Pending | TBD | Awaiting Phase 2 decision |
| **Phase 4: Asset Preloading** | ⏸️ Pending | TBD | Awaiting Phase 2 decision |

**Key Decision:** Critical CSS optimization skipped due to pattern dependency architecture. See "Critical CSS Implementation Results" section for details and future refactoring options.

---

## Table of Contents

1. [Overview](#overview)
2. [Implementation Details](#implementation-details)
   - [1. Lazy Loading Images](#1-lazy-loading-images)
   - [2. Critical CSS with Print Media Defer](#2-critical-css-with-print-media-defer)
   - [3. Service Worker](#3-service-worker)
   - [4. Asset Preloading with Prefetching](#4-asset-preloading-with-prefetching)
3. [Manual Cache Clear Integration](#manual-cache-clear-integration)
4. [TODO Items (For Later)](#todo-items-for-later)
5. [Implementation Checklist](#implementation-checklist)
6. [Questions to Answer Before Implementation](#questions-to-answer-before-implementation)
7. [Expected Results](#expected-results)

---

## Overview

Implementing 4 major performance optimizations:

1. **Lazy Loading Images** - Option A (WordPress native + enhancements)
2. **Critical CSS** - Manual with print media defer trick (files to be discussed during implementation)
3. **Service Worker** - **Workbox library** ✅ DECIDED
4. **Asset Preloading** - Smart auto-detection with prefetching

**Key Principles:**
- All caching must be clearable with manual cache clear button
- Smart auto-detection for parent/child theme assets
- Zero code changes required in child theme
- Maintains existing architecture and conventions

---

## Implementation Details

### 1. Lazy Loading Images

**Strategy:** Option A - WordPress native + enhancements

**What WordPress Does Automatically:**
- Adds `loading="lazy"` to all `<img>` tags since WordPress 5.5
- Works on existing images without template changes

**What We're Adding:**
- Disable lazy loading for hero/featured images (LCP optimization)
- Add `fetchpriority="high"` to first image per page
- Ensure above-the-fold images load immediately

#### Implementation

**Code Location:** `src/functions/performance.php` (new file)

```php
<?php
/**
 * Performance optimizations
 */

// Disable lazy loading for important images
add_filter('wp_lazy_loading_enabled', 'dream_disable_lazy_loading_for_important_images', 10, 3);
function dream_disable_lazy_loading_for_important_images($default, $tag_name, $context) {
    // Don't lazy load featured images on single posts/pages
    if ($context === 'the_post_thumbnail' && is_singular()) {
        return false;
    }

    return $default;
}

// Add fetchpriority to first image
add_filter('wp_get_attachment_image_attributes', 'dream_add_fetchpriority_to_first_image', 10, 3);
function dream_add_fetchpriority_to_first_image($attr, $attachment, $size) {
    static $first_image = true;

    if ($first_image && in_array($size, ['large', 'full'])) {
        $attr['fetchpriority'] = 'high';
        unset($attr['loading']); // Don't lazy load the hero image
        $first_image = false;
    }

    return $attr;
}
```

#### Cache Clearing
- **No cache to clear** (pure runtime behavior)

#### Child Theme Handling
- **Automatic** (WordPress feature, works everywhere)

**Effort:** 1-2 hours

---

### 2. Critical CSS with Print Media Defer

**Strategy:** Manual critical CSS + print media defer trick

#### How It Works

```html
<head>
    <!-- 1. Critical CSS (inline, renders immediately) -->
    <style id="critical-css">
        /* 5-10KB of structural styles */
    </style>

    <!-- 2. Full stylesheet (deferred using print trick) -->
    <link rel="stylesheet"
          href="/dist/wp/css/dream.css"
          media="print"
          onload="this.media='all'">

    <!-- 3. Noscript fallback -->
    <noscript>
        <link rel="stylesheet" href="/dist/wp/css/dream.css">
    </noscript>
</head>
```

**What happens:**
1. Browser sees `media="print"` → doesn't block rendering
2. Browser downloads it in background (low priority)
3. `onload` fires when downloaded → changes to `media="all"`
4. Styles apply without blocking initial render

**Result:** Page renders in ~150ms instead of ~800ms

#### Critical CSS Implementation Results ⚠️ NOT IMPLEMENTED

**Status:** Attempted but skipped due to architectural constraints

**Implementation Attempt Summary:**
- Attempted to split critical CSS (fonts, elements, base styles) from main bundle
- Attempted to inline critical CSS and defer `dream.css` with print media trick
- Attempted various approaches to avoid pattern dependency chain breakage

**Why It Didn't Work:**

1. **Pattern Dependency Chain**
   - Patterns import from `'00-protons'` expecting ALL base styles
   - When base styles removed from `_base.scss`, patterns lose Font Awesome, typography, elements
   - Example: `import base from '00-protons'` expects complete base styles
   - Cannot split without breaking every pattern's styling

2. **Bootstrap Critical Extraction Issues**
   - Moving `bootstrap-critical` into inlined CSS changed load order
   - Bootstrap components depend on bootstrap-critical being loaded via `<link>` tag
   - Inlining broke cascade specificity and component dependencies

3. **FOUC Prevention Hurts Performance**
   - Using `opacity: 0` to hide unstyled content delayed FCP/LCP metrics
   - Lighthouse penalizes invisible content even if rendered
   - Anti-FOUC techniques reduced Lighthouse score instead of improving it

4. **Minimal Performance Gain**
   - Only able to defer conditionally-loaded components (patterns, blocks, Bootstrap components)
   - `bootstrap/critical.css` (~20KB) + `dream.css` (~300KB) still render-blocking
   - Deferring small conditional files showed negligible improvement

**What We Learned:**

- Current architecture requires all base styles in `dream.css` for patterns to work
- Splitting base styles requires refactoring entire pattern import system
- Inlining minimal CSS conflicts with pattern dependency requirements
- Complexity and maintenance burden outweighs performance benefits

**Decision:** Skip Phase 2 (Critical CSS) and focus on Phase 1 (Lazy Loading) which provides significant gains without architectural refactoring.

---

#### Structural Refactoring Required (For Future Consideration)

If you want to implement critical CSS properly in the future, here's the exact refactoring needed:

**Option A: Explicit Pattern Dependencies (Recommended)**

**Current Pattern Structure:**
```javascript
// patterns/02-molecules/card/index.js
import base from '00-protons';  // Gets EVERYTHING from _base.scss
import './card.scss';
```

**Required Refactoring:**
```javascript
// patterns/02-molecules/card/index.js
// Import only what this pattern actually needs
import '00-protons/printing/type';      // If uses custom fonts
import '00-protons/printing/elements';  // If depends on body/html styles
import '00-protons/printing/libs/all';  // If uses Font Awesome icons
import './card.scss';
```

**Impact:**
- ✅ Allows splitting base styles into critical/non-critical
- ✅ Patterns explicitly declare dependencies
- ✅ Easier to track what's actually used
- ❌ Requires updating ~50-100 pattern files
- ❌ High effort (~8-16 hours)
- ❌ Risk of breaking patterns if dependencies missed

**Option B: Remove `_base.scss` Import Pattern**

**Current Architecture:**
```javascript
// 00-protons/index.js
import './_bootstrap-critical.scss';
import './_base.scss';  // Everything bundled here

// Patterns import from '00-protons'
import base from '00-protons';
```

**Required Refactoring:**
```javascript
// 00-protons/index.js
import './_bootstrap-critical.scss';
// Don't import _base.scss here at all

// Create separate entry points
// 00-protons/base.js
export { default as type } from './printing/type';
export { default as elements } from './printing/elements';
export { default as libs } from './printing/libs/all';

// Patterns import specific modules
import { type, elements } from '00-protons/base';
```

**Impact:**
- ✅ Clean separation of concerns
- ✅ Tree-shaking potential
- ❌ Requires webpack configuration changes
- ❌ Requires updating all patterns
- ❌ More complex build process
- ❌ Very high effort (~16-24 hours)

**Option C: Accept Duplication (Pragmatic)**

**Approach:**
- Keep current architecture unchanged
- Include critical styles in BOTH places:
  - Inlined in `<head>` for fast first render
  - In `dream.css` for pattern dependencies
- Accept ~8-12KB duplication

**Implementation:**
```scss
// _critical.scss (inlined)
@import 'printing/libs/all';
@import 'printing/type';
@import 'printing/elements';

// _base.scss (still includes everything)
@import 'printing/libs/all';  // Duplicated
@import 'printing/type';      // Duplicated
@import 'printing/elements';  // Duplicated
// ... rest of base styles
```

**Impact:**
- ✅ No pattern refactoring needed
- ✅ Fast first render (critical CSS inline)
- ✅ Patterns continue to work
- ❌ ~8-12KB duplication
- ❌ Users download some CSS twice
- ⚖️ Low effort (~2-4 hours)

---

**Recommendation:** If critical CSS is needed in future:
1. **Short term:** Option C (accept duplication) - minimal effort, some benefit
2. **Long term:** Option A (explicit dependencies) - proper architecture, worth the effort if doing major refactoring anyway

---

#### Implementation (NOT COMPLETED)

**Code Location:** `src/functions/performance.php`

```php
// Enqueue critical CSS and defer main stylesheet
add_action('wp_head', 'dream_enqueue_critical_css', 1);
function dream_enqueue_critical_css() {
    // 1. Inline critical CSS
    $critical_css = dream_get_critical_css();
    echo "<style id='critical-css'>{$critical_css}</style>";

    // 2. Enqueue main stylesheet (will be deferred)
    wp_enqueue_style(
        'dream-styles',
        get_template_directory_uri() . '/dist/wp/css/dream.css',
        [],
        wp_get_theme()->get('Version'),
        'all'
    );
}

// Defer non-critical CSS
add_filter('style_loader_tag', 'dream_defer_non_critical_css', 10, 4);
function dream_defer_non_critical_css($html, $handle, $href, $media) {
    // Only defer main stylesheet
    if ($handle === 'dream-styles') {
        // Change media to print, add onload handler
        $html = str_replace("media='all'", "media='print' onload=\"this.media='all'\"", $html);

        // Add noscript fallback
        $html .= '<noscript><link rel="stylesheet" href="' . esc_url($href) . '"></noscript>';
    }

    return $html;
}

// Get critical CSS (cached)
function dream_get_critical_css() {
    $cache_key = 'dream_critical_css';
    $critical = get_transient($cache_key);

    if (false === $critical) {
        $critical = '';

        // Child theme critical CSS (if exists)
        $child_file = get_stylesheet_directory() . '/dist/wp/css/critical.css';
        if (file_exists($child_file)) {
            $critical .= file_get_contents($child_file);
        }

        // Parent theme critical CSS
        $parent_file = get_template_directory() . '/dist/wp/css/critical.css';
        if (file_exists($parent_file)) {
            $critical .= file_get_contents($parent_file);
        }

        // Minify (remove comments, extra whitespace)
        $critical = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $critical);
        $critical = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $critical);

        set_transient($cache_key, $critical, WEEK_IN_SECONDS);
    }

    return $critical;
}

// Clear cache when customizer saved
add_action('customize_save_after', 'dream_clear_critical_css_cache');
function dream_clear_critical_css_cache() {
    delete_transient('dream_critical_css');
}

// Clear cache when theme switched
add_action('switch_theme', 'dream_clear_critical_css_cache');
```

**File Structure:**
```
src/scss/
├── critical.scss           ← Create this (structural styles only)
└── ...

dist/wp/css/
├── critical.css            ← Generated from critical.scss
└── ...
```

#### Cache Strategy

**Transient:** `dream_critical_css`
**TTL:** 1 week
**Invalidation:**
- Customizer saved
- Theme switched
- **Manual cache clear button** (required integration)

#### Child Theme Handling

**Smart Auto-Detection:**
- Checks child theme first: `/child-theme/dist/wp/css/critical.css`
- Falls back to parent: `/parent-theme/dist/wp/css/critical.css`
- Concatenates both if child exists
- Child needs NO code changes

**Child Theme Structure:**
```
child-theme/
└── dist/
    └── wp/
        └── css/
            └── critical.css  ← Optional child-specific critical CSS
```

**Effort:** 4-6 hours (including critical.css creation discussion)

---

### 3. Service Worker

**Strategy:** Workbox library ✅ DECIDED

**Decision:** Using Workbox for cleaner code, better strategies, and auto-cleanup. The +15KB dependency is acceptable for the improved maintainability and features.

#### Implementation

**File Structure:**
```
src/
├── js/
│   ├── sw.js              ← Service worker (imports Workbox)
│   └── register-sw.js     ← Registers SW
└── functions/
    └── performance.php    ← Enqueues register-sw.js
```

**sw.js:**
```javascript
import { precacheAndRoute } from 'workbox-precaching';
import { registerRoute } from 'workbox-routing';
import { CacheFirst, NetworkFirst, StaleWhileRevalidate } from 'workbox-strategies';
import { ExpirationPlugin } from 'workbox-expiration';

// Get version from PHP (for cache busting)
const CACHE_VERSION = 'v1'; // Will be dynamic

// Precache critical assets
precacheAndRoute([
    { url: '/', revision: CACHE_VERSION },
    { url: '/dist/wp/css/critical.css', revision: CACHE_VERSION },
    { url: '/dist/wp/js/main.js', revision: CACHE_VERSION },
]);

// Cache pattern assets dynamically (parent + child)
registerRoute(
    ({ url }) => url.pathname.includes('/patterns/'),
    new CacheFirst({
        cacheName: 'patterns',
        plugins: [
            new ExpirationPlugin({
                maxEntries: 100, // Support parent + child patterns
                maxAgeSeconds: 30 * 24 * 60 * 60, // 30 days
            }),
        ],
    })
);

// Cache images
registerRoute(
    ({ request }) => request.destination === 'image',
    new CacheFirst({
        cacheName: 'images',
        plugins: [
            new ExpirationPlugin({
                maxEntries: 60,
                maxAgeSeconds: 30 * 24 * 60 * 60, // 30 days
            }),
        ],
    })
);

// Cache API requests
registerRoute(
    ({ url }) => url.pathname.startsWith('/wp-json/'),
    new NetworkFirst({
        cacheName: 'api',
        plugins: [
            new ExpirationPlugin({
                maxAgeSeconds: 5 * 60, // 5 minutes
            }),
        ],
    })
);

// Cache Google Fonts
registerRoute(
    ({ url }) => url.origin === 'https://fonts.googleapis.com' ||
                 url.origin === 'https://fonts.gstatic.com',
    new StaleWhileRevalidate({
        cacheName: 'google-fonts',
    })
);
```

**register-sw.js:**
```javascript
// Register service worker
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        const swUrl = '/wp-content/themes/timberland/dist/wp/js/sw.js';

        navigator.serviceWorker
            .register(swUrl)
            .then(registration => {
                console.log('SW registered:', registration);
            })
            .catch(error => {
                console.log('SW registration failed:', error);
            });
    });
}
```

**Enqueue in PHP:**
```php
// functions/performance.php

add_action('wp_enqueue_scripts', 'dream_enqueue_service_worker');
function dream_enqueue_service_worker() {
    wp_enqueue_script(
        'dream-register-sw',
        get_template_directory_uri() . '/dist/wp/js/register-sw.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
```

#### Alternative: Vanilla JS Implementation

**sw.js (vanilla):**
```javascript
const CACHE_VERSION = 'timberland-v1';
const CACHE_NAME = `${CACHE_VERSION}`;

// Install - cache critical assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache =>
            cache.addAll([
                '/',
                '/dist/wp/css/critical.css',
                '/dist/wp/js/main.js',
            ])
        ).then(() => self.skipWaiting())
    );
});

// Activate - clean up old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(name => name !== CACHE_NAME)
                    .map(name => caches.delete(name))
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch - serve from cache, fallback to network
self.addEventListener('fetch', event => {
    const { request } = event;

    // Cache-first strategy
    event.respondWith(
        caches.match(request)
            .then(response => {
                if (response) {
                    return response;
                }

                return fetch(request).then(response => {
                    // Cache successful responses
                    if (request.method === 'GET' && response.status === 200) {
                        const responseClone = response.clone();
                        caches.open(CACHE_NAME).then(cache => {
                            cache.put(request, responseClone);
                        });
                    }

                    return response;
                });
            })
            .catch(() => {
                // Return offline page if available
                return caches.match('/offline.html');
            })
    );
});
```

#### Cache Strategy

**Service Worker Creates Multiple Caches:**
- `patterns` - Pattern CSS/JS files
- `images` - Image assets
- `api` - WordPress REST API responses
- `google-fonts` - External font files

**Invalidation:**
- Automatic on version bump (new deploy)
- **Manual cache clear** - Bump version number
- Old caches automatically deleted on activation

#### Cache Clearing

```php
// Add to manual cache clear function

function dream_clear_all_caches() {
    // Existing cache clearing...

    // Service worker version bump
    update_option('dream_sw_version', time());

    // Admin notice
    add_action('admin_notices', function() {
        echo '<div class="notice notice-info"><p>';
        echo 'Cache cleared! Service worker will update on users\' next visit.';
        echo '</p></div>';
    });
}
```

**Note:** Service worker cache is client-side and cannot be cleared from server. Version bump forces clients to download new service worker on next visit.

#### Child Theme Handling

**Automatic:**
- Service worker caches ALL pattern CSS/JS regardless of source
- Works for both parent and child theme assets
- Caches based on URL pattern, not file location
- No child theme code needed

**Cached URLs:**
```
/wp-content/themes/timberland/dist/wp/css/patterns/hero.css       ✅ Cached
/wp-content/themes/timberland-child/dist/wp/css/patterns/hero.css ✅ Cached
```

**Effort:** 6-8 hours

---

### 4. Asset Preloading with Prefetching

**Strategy:** Smart auto-detection with prefetching

#### What It Does

**Preload (High Priority - Current Page):**
- Critical CSS/JS
- Current page patterns (first 3, above fold)
- Featured/hero images

**Prefetch (Low Priority - Next Page):**
- Predicted next page URL
- Patterns used on predicted next page
- Related content

#### Implementation

**Code Location:** `src/functions/performance.php`

```php
// Main preloading function
add_action('wp_head', 'dream_smart_asset_preloading', 1);
function dream_smart_asset_preloading() {
    // 1. Critical assets (always preload)
    dream_preload_critical_assets();

    // 2. Current page patterns (auto-detects parent/child)
    dream_preload_current_page_patterns();

    // 3. Next page prediction (prefetch)
    dream_prefetch_next_page_assets();
}

// Preload critical assets
function dream_preload_critical_assets() {
    // Critical font (prevents FOIT - Flash of Invisible Text)
    $font_path = dream_find_asset('fonts/primary-bold.woff2');
    if ($font_path) {
        echo '<link rel="preload" href="' . $font_path . '" as="font" type="font/woff2" crossorigin>';
    }

    // Critical JavaScript
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/wp/js/main.js" as="script">';

    // External domains (preconnect)
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}

// Preload current page patterns
function dream_preload_current_page_patterns() {
    $post_id = get_the_ID();
    if (!$post_id) return;

    $patterns = dream_detect_patterns($post_id);

    // Preload first 3 patterns (likely above fold)
    foreach (array_slice($patterns, 0, 3) as $pattern) {
        // Smart detection - checks child first, then parent
        $css_url = dream_find_pattern_asset($pattern, 'css');
        $js_url = dream_find_pattern_asset($pattern, 'js');

        if ($css_url) {
            echo "<link rel='preload' href='{$css_url}' as='style'>";
        }
        if ($js_url) {
            echo "<link rel='preload' href='{$js_url}' as='script'>";
        }
    }

    // Preload featured image
    if (has_post_thumbnail()) {
        $thumb = get_the_post_thumbnail_url($post_id, 'large');
        echo "<link rel='preload' href='{$thumb}' as='image'>";
    }
}

// Prefetch next likely page
function dream_prefetch_next_page_assets() {
    $next_page_id = dream_predict_next_page();
    if (!$next_page_id) return;

    // Prefetch the page itself
    $next_url = get_permalink($next_page_id);
    echo "<link rel='prefetch' href='{$next_url}'>";

    // Prefetch its patterns (first 2 only)
    $next_patterns = dream_detect_patterns($next_page_id);
    foreach (array_slice($next_patterns, 0, 2) as $pattern) {
        $css_url = dream_find_pattern_asset($pattern, 'css');
        if ($css_url) {
            echo "<link rel='prefetch' href='{$css_url}' as='style'>";
        }
    }
}

// Smart asset finder (checks child first, then parent)
function dream_find_pattern_asset($pattern, $type) {
    // Check child theme first
    $child_path = get_stylesheet_directory() . "/dist/wp/{$type}/patterns/{$pattern}.{$type}";
    if (file_exists($child_path)) {
        return get_stylesheet_directory_uri() . "/dist/wp/{$type}/patterns/{$pattern}.{$type}";
    }

    // Fallback to parent
    $parent_path = get_template_directory() . "/dist/wp/{$type}/patterns/{$pattern}.{$type}";
    if (file_exists($parent_path)) {
        return get_template_directory_uri() . "/dist/wp/{$type}/patterns/{$pattern}.{$type}";
    }

    return null;
}

// Generic asset finder
function dream_find_asset($relative_path) {
    // Check child theme
    $child_path = get_stylesheet_directory() . "/dist/wp/{$relative_path}";
    if (file_exists($child_path)) {
        return get_stylesheet_directory_uri() . "/dist/wp/{$relative_path}";
    }

    // Fallback to parent
    $parent_path = get_template_directory() . "/dist/wp/{$relative_path}";
    if (file_exists($parent_path)) {
        return get_template_directory_uri() . "/dist/wp/{$relative_path}";
    }

    return null;
}

// Pattern detection (cached)
function dream_detect_patterns($post_id) {
    $cache_key = "dream_patterns_{$post_id}";
    $patterns = get_transient($cache_key);

    if (false === $patterns) {
        $content = get_post_field('post_content', $post_id);
        $blocks = parse_blocks($content);

        $patterns = [];
        array_walk_recursive($blocks, function($block) use (&$patterns) {
            if (isset($block['blockName']) && strpos($block['blockName'], 'acf/') === 0) {
                $patterns[] = str_replace('acf/', '', $block['blockName']);
            }
        });

        $patterns = array_unique($patterns);
        set_transient($cache_key, $patterns, DAY_IN_SECONDS);
    }

    return $patterns;
}

// Next page prediction
function dream_predict_next_page() {
    // Homepage → About page
    if (is_front_page()) {
        $about = get_page_by_path('about');
        return $about ? $about->ID : null;
    }

    // Blog post → First related post
    if (is_single()) {
        $related = get_posts([
            'posts_per_page' => 1,
            'category__in' => wp_get_post_categories(get_the_ID()),
            'post__not_in' => [get_the_ID()],
        ]);
        return $related[0]->ID ?? null;
    }

    // Archive → First post
    if (is_archive()) {
        global $wp_query;
        return $wp_query->posts[0]->ID ?? null;
    }

    return null;
}
```

#### Cache Strategy

**Transient:** `dream_patterns_{post_id}`
**TTL:** 1 day
**Purpose:** Cache pattern detection per post

**Invalidation:**
- Automatic on post save/update
- **Manual cache clear button** (required integration)

```php
// Clear pattern cache when post saved
add_action('save_post', 'dream_clear_pattern_cache');
function dream_clear_pattern_cache($post_id) {
    delete_transient("dream_patterns_{$post_id}");
}
```

#### Child Theme Handling

**Smart Auto-Detection (Option C):**
- Automatically checks child theme first for each asset
- Falls back to parent if not found in child
- Works for patterns, CSS, JS, fonts, images, etc.
- Zero code changes needed in child theme

**How It Works:**
```php
// Check child first
$child_file = get_stylesheet_directory() . '/dist/wp/css/patterns/hero.css';
if (file_exists($child_file)) {
    return get_stylesheet_directory_uri() . '/dist/wp/css/patterns/hero.css';
}

// Fallback to parent
return get_template_directory_uri() . '/dist/wp/css/patterns/hero.css';
```

**Child Theme Structure:**
```
child-theme/
└── dist/
    └── wp/
        ├── css/
        │   └── patterns/
        │       └── custom-hero.css  ← Auto-detected
        ├── js/
        │   └── patterns/
        │       └── custom-hero.js   ← Auto-detected
        └── fonts/
            └── custom-font.woff2    ← Auto-detected
```

**Effort:** 4-6 hours

---

## Manual Cache Clear Integration

### Requirement

All new caching mechanisms must be clearable with the existing manual cache clear button.

### Locate Existing Function

Find the existing manual cache clear function (search for "clear cache" in codebase).

### Add New Cache Clearing

```php
// Add to existing manual cache clear function

function dream_clear_cache_manually() {
    // === EXISTING CACHE CLEARING ===
    // (Keep all existing code)

    // === NEW: Critical CSS Cache ===
    delete_transient('dream_critical_css');

    // === NEW: Pattern Detection Cache ===
    // Clear all pattern detection transients
    global $wpdb;
    $wpdb->query(
        "DELETE FROM {$wpdb->options}
         WHERE option_name LIKE '_transient_dream_patterns_%'
         OR option_name LIKE '_transient_timeout_dream_patterns_%'"
    );

    // === NEW: Service Worker Version Bump ===
    update_option('dream_sw_version', time());

    // === NEW: Admin Notice ===
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible"><p>';
        echo '<strong>All caches cleared!</strong><br>';
        echo 'Critical CSS, pattern detection, and service worker caches have been cleared.<br>';
        echo 'Service worker will update on users\' next page visit.';
        echo '</p></div>';
    });
}
```

### All Caches to Clear

| Cache Type | Storage | Clear Method | Notes |
|------------|---------|--------------|-------|
| **Critical CSS** | Transient: `dream_critical_css` | `delete_transient()` | Single transient |
| **Pattern Detection** | Transient: `dream_patterns_{post_id}` | Delete by pattern with SQL | Multiple transients (one per post) |
| **Service Worker** | Browser cache (client-side) | Bump version number | Can't clear directly from server |
| **Existing Caches** | Various | Existing code | Keep all existing clearing |

### Testing Cache Clear

**Verify all caches clear:**
1. Click manual cache clear button
2. Check transients deleted: `wp transient delete dream_critical_css`
3. Check option updated: `wp option get dream_sw_version`
4. Verify admin notice appears
5. Test service worker updates on next page load

---

## TODO Items (For Later)

### PWA Manifest & Offline Features

**Purpose:** Enable Progressive Web App features
- Install prompt ("Add to Home Screen")
- Full-screen mode
- Home screen icon
- Offline page template
- (Optional) Push notifications

**Files to Create:**

```json
// manifest.json (in theme root)
{
    "name": "Timberland Theme",
    "short_name": "Timberland",
    "description": "A WordPress theme with offline support",
    "start_url": "/",
    "display": "standalone",
    "background_color": "#ffffff",
    "theme_color": "#0066cc",
    "icons": [
        {
            "src": "/wp-content/themes/timberland/dist/wp/img/icon-192.png",
            "sizes": "192x192",
            "type": "image/png"
        },
        {
            "src": "/wp-content/themes/timberland/dist/wp/img/icon-512.png",
            "sizes": "512x512",
            "type": "image/png"
        }
    ]
}
```

**Icons Needed:**
- `dist/wp/img/icon-192.png` (192x192px)
- `dist/wp/img/icon-512.png` (512x512px)

**Code to Add:**

```php
// functions/performance.php

add_action('wp_head', 'dream_pwa_manifest');
function dream_pwa_manifest() {
    echo '<link rel="manifest" href="' . get_template_directory_uri() . '/manifest.json">';
    echo '<meta name="theme-color" content="#0066cc">';
}
```

**Offline Page Template:**

```twig
{# templates/offline.twig #}

{% extends "layouts/base.twig" %}

{% block content %}
    <div class="container text-center py-5">
        <h1>You're Offline</h1>
        <p class="lead">It looks like you've lost your internet connection.</p>
        <p>Don't worry - some content is still available from your cache.</p>

        <button class="btn btn-primary" onclick="window.location.reload()">
            Try Again
        </button>
    </div>
{% endblock %}
```

**Update Service Worker:**

```javascript
// Add to sw.js

// Offline page fallback
self.addEventListener('fetch', event => {
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request).catch(() => {
                return caches.match('/offline');
            })
        );
    }
});
```

**Effort:** 2-3 hours

**Priority:** Low (nice-to-have)

---

## Implementation Checklist

### Pre-Implementation

#### Critical CSS Discussion Required ⚠️ REVIEW BEFORE PHASE 2

Before starting Phase 2 (Critical CSS), **we will discuss and decide:**

- [ ] **Which SCSS files go in critical.css?**
  - [ ] Variables (yes)
  - [ ] Reboot (yes)
  - [ ] Grid - all or subset?
  - [ ] Utilities - all or common only?
  - [ ] Header styles - include?
  - [ ] Footer styles - skip?
  - [ ] Typography - all or base only?

- [ ] **Target size for critical.css** (recommended: 5-10KB)

- [ ] **Template-specific critical CSS?**
  - [ ] Single file for all templates?
  - [ ] OR separate files per template type?
    - [ ] `critical-home.css`
    - [ ] `critical-single.css`
    - [ ] `critical-archive.css`

**Note:** This discussion will happen when we reach Phase 2 implementation.

#### Service Worker Decision ✅ DECIDED

- [x] **Workbox library** - Cleaner code, better strategies, auto-cleanup (+15KB is acceptable)

#### Other Pre-Implementation Tasks

- [ ] Locate existing manual cache clear function
- [ ] Verify child theme extends parent (not standalone)
- [ ] Confirm child theme structure matches expected layout

### Implementation Order

#### Phase 1: Lazy Loading (1-2 hours) ✅ COMPLETED

- [x] Create `src/functions/performance.php`
- [x] Add lazy loading filters
- [x] Include in `functions.php`
- [x] Test with featured images
- [x] Test with content images
- [x] Verify fetchpriority works

**Status:** ✅ Implemented and working
**Location:** `src/functions/performance.php` lines 1-65
**Benefits:** Improved LCP for hero images, reduced initial page load size

#### Phase 2: Critical CSS (4-6 hours) ⚠️ SKIPPED

**Status:** Attempted but not implemented due to architectural constraints

**Reason for Skipping:**
- Pattern dependency chain requires all base styles in `dream.css`
- Splitting base styles breaks pattern imports
- FOUC prevention hurts Lighthouse metrics more than helps
- Minimal performance gain for high complexity/maintenance cost

**See:** "Critical CSS Implementation Results" section above for detailed findings

**Options for Future:** See "Structural Refactoring Required" section for:
- Option A: Explicit pattern dependencies (~8-16 hours)
- Option B: Modular import system (~16-24 hours)
- Option C: Accept duplication (~2-4 hours)

**Decision:** Focus on other optimizations (service worker, preloading) instead

#### Phase 3: Asset Preloading (4-6 hours)

**Step 1: Pattern Detection**
- [ ] Add `dream_detect_patterns()` with caching
- [ ] Add pattern cache clearing on post save
- [ ] Test pattern detection accuracy

**Step 2: Smart Asset Finding**
- [ ] Add `dream_find_pattern_asset()` helper
- [ ] Add `dream_find_asset()` helper
- [ ] Test child theme override detection

**Step 3: Preload Implementation**
- [ ] Add `dream_preload_critical_assets()`
- [ ] Add `dream_preload_current_page_patterns()`
- [ ] Test preload tags output correctly

**Step 4: Prefetch Implementation**
- [ ] Add `dream_predict_next_page()`
- [ ] Add `dream_prefetch_next_page_assets()`
- [ ] Test prefetch works for predicted pages
- [ ] Customize predictions per site

**Step 5: Manual Cache Integration**
- [ ] Add pattern cache clear to manual button
- [ ] Test clearing works
- [ ] Verify cache rebuilds

**Step 6: Testing**
- [ ] Test parent theme preloading
- [ ] Test child theme preloading
- [ ] Test prefetch predictions
- [ ] Verify DevTools Network tab shows preloads
- [ ] Measure navigation speed improvement

#### Phase 4: Service Worker (6-8 hours)

**Step 1: Setup**
- [x] **DECISION: Workbox** ✅
- [ ] Install Workbox: `npm install workbox-precaching workbox-routing workbox-strategies workbox-expiration`
- [ ] Create `src/js/sw.js`
- [ ] Create `src/js/register-sw.js`

**Step 2: Service Worker Implementation**
- [ ] Add precaching logic
- [ ] Add pattern caching strategy
- [ ] Add image caching strategy
- [ ] Add API caching strategy
- [ ] Add font caching strategy

**Step 3: Registration**
- [ ] Add registration enqueue in PHP
- [ ] Test service worker registers
- [ ] Verify caching strategies work

**Step 4: Version Management**
- [ ] Implement version bumping system
- [ ] Test cache invalidation on version bump
- [ ] Test old caches get cleaned up

**Step 5: Manual Cache Integration**
- [ ] Add SW version bump to manual button
- [ ] Add admin notice about SW updates
- [ ] Test clearing triggers version bump

**Step 6: Testing**
- [ ] Test caching behavior (DevTools Application tab)
- [ ] Test offline functionality
- [ ] Test cache updates on new version
- [ ] Test pattern caching (parent + child)
- [ ] Test image caching
- [ ] Measure repeat visit speed

### Post-Implementation

#### Performance Testing

- [ ] Measure Before metrics (FCP, LCP, TTI, Total Load)
- [ ] Implement all optimizations
- [ ] Measure After metrics
- [ ] Document actual improvements
- [ ] Compare to expected improvements

#### Verification Testing

- [ ] Test on parent theme only site
- [ ] Test on parent + child theme site
- [ ] Test child theme asset overrides
- [ ] Test manual cache clear clears ALL caches
- [ ] Test cache rebuilding after clearing
- [ ] Test service worker updates properly

#### Browser Testing

- [ ] Test in Chrome/Edge
- [ ] Test in Firefox
- [ ] Test in Safari
- [ ] Test on mobile devices
- [ ] Test offline functionality

#### Documentation

- [ ] Update PERFORMANCE-OPTIMIZATION-GUIDE.md with actual results
- [ ] Document critical CSS contents
- [ ] Document cache clearing process
- [ ] Add inline code comments

---

## Questions to Answer Before Implementation

### 1. Critical CSS File Split

**Which SCSS files should be included in critical.css?**

#### Definitely Include

- ✅ `src/scss/base/_variables.scss` - CSS custom properties
- ✅ `bootstrap/scss/_reboot.scss` - Base HTML element styles
- ✅ `bootstrap/scss/_root.scss` - CSS custom properties

#### Need Discussion

**Grid System:**
- [ ] Include ALL of `bootstrap/scss/_grid.scss`?
- [ ] OR just container/row/col basics?
- [ ] How much is "critical" vs. can be deferred?

**Utilities:**
- [ ] Include ALL of `bootstrap/scss/_utilities.scss`?
- [ ] OR just most common (d-flex, text-center, etc.)?
- [ ] Create subset of critical utilities?

**Header:**
- [ ] Include all header styles? (always above fold)
- [ ] Just structure or full styling?
- [ ] Include navigation styles?

**Footer:**
- [ ] Skip entirely? (below fold)
- [ ] OR include basic structure?

**Typography:**
- [ ] All heading/paragraph styles?
- [ ] OR just base font family and sizes?
- [ ] Include responsive typography?

**Forms:**
- [ ] Include if login/search above fold?
- [ ] Skip if usually below fold?

#### Size Target

- [ ] What's acceptable size for critical.css?
  - Recommended: 5-10KB
  - Maximum: 14KB (HTTP/2 initial congestion window)

#### Template-Specific Critical CSS

- [ ] Create one critical.css for all templates?
- [ ] OR separate files per template type?
  - `critical-home.css` (homepage)
  - `critical-single.css` (blog posts)
  - `critical-archive.css` (archives/listings)
  - `critical-page.css` (static pages)

**Pros of template-specific:**
- Smaller, more focused critical CSS
- Better optimization per template type

**Cons:**
- More files to maintain
- More complex logic
- Potentially more cache entries

### 2. Service Worker Technology Choice ✅ DECIDED

**Decision: Workbox Library**

| Criteria | Workbox Library | Vanilla JS |
|----------|----------------|------------|
| **Bundle Size** | +15KB | +0KB |
| **Code to Write** | ~50 lines | ~150 lines |
| **Maintenance** | Low (battle-tested) | Medium (custom code) |
| **Features** | Advanced strategies, auto-cleanup | Basic caching |
| **Learning Curve** | Medium | Low |
| **Updates** | npm updates | Manual |

**Rationale:**
- [x] 15KB is acceptable for better features ✅
- [x] Advanced caching strategies provide better performance ✅
- [x] Less code to write and maintain ✅
- [x] Battle-tested library with automatic updates ✅

### 3. Child Theme Confirmation

**Verify child theme structure:**

```
child-theme/
├── style.css              ← Exists?
├── functions.php          ← Extends parent?
└── dist/
    └── wp/
        ├── css/
        │   ├── critical.css      ← Will this exist?
        │   └── patterns/         ← Custom patterns here?
        └── js/
            └── patterns/         ← Custom scripts here?
```

**Questions:**
- [ ] Will child theme have its own `critical.css`?
- [ ] Will child theme add new patterns?
- [ ] Will child theme override parent patterns?
- [ ] Does child theme build process match parent?

### 4. Prediction Customization

**Next page prediction logic:**

```php
function dream_predict_next_page() {
    // Homepage → About
    if (is_front_page()) {
        return get_page_by_path('about')->ID;
    }

    // What else should we predict?
}
```

**Questions:**
- [ ] What pages do users typically navigate to from homepage?
- [ ] What content is related from blog posts?
- [ ] Should we use analytics data for predictions?
- [ ] Limit to 1-2 predictions or allow more?

---

## Expected Results

### Performance Improvements

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| **FCP** (First Contentful Paint) | 1.5-2.5s | 0.4-0.8s | **-60-70%** |
| **LCP** (Largest Contentful Paint) | 2.5-4s | 1.0-1.8s | **-60%** |
| **TTI** (Time to Interactive) | 3.5-5.5s | 1.5-2.5s | **-55%** |
| **Total Load Time** | 3-5s | 1.2-2.2s | **-60%** |

### Breakdown by Optimization

| Optimization | FCP Impact | LCP Impact | Notes |
|--------------|------------|------------|-------|
| **Lazy Loading** | +0-100ms | -500-1000ms | Huge LCP improvement |
| **Critical CSS** | -500-1000ms | -200-400ms | Biggest FCP win |
| **Service Worker** | +0ms first visit<br>-1500-2000ms repeat | +0ms first visit<br>-1000-1500ms repeat | Only helps repeat visits |
| **Asset Preloading** | -200-400ms | -200-500ms | Moderate across the board |

### User Experience Improvements

**First Visit:**
- Page appears in ~500ms (critical CSS renders structure)
- Content loads progressively
- Images load as user scrolls

**Repeat Visit:**
- Page appears in ~100ms (service worker cache)
- Nearly instant navigation
- Works offline

**Navigation:**
- Next pages appear instantly (prefetch)
- No waiting for assets to download
- Smooth transitions

### Resource Improvements

| Resource | Before | After | Improvement |
|----------|--------|-------|-------------|
| **Initial CSS** | 100KB blocking | 5-10KB inline | **-90-95%** |
| **Images Downloaded** | All at once | Only visible | **-60-80%** |
| **Repeat Visit Assets** | Re-download all | From cache | **-95%+ bandwidth** |

### Core Web Vitals

| Metric | Before | After | Status |
|--------|--------|-------|--------|
| **LCP** | Poor (2.5-4s) | Good (<2.5s) | ✅ Pass |
| **FID** | Good | Good | ✅ Pass |
| **CLS** | Good | Good | ✅ Pass |

### PageSpeed Insights (Estimated)

- **Mobile Score:** 40-60 → **75-90** (+35-50 points)
- **Desktop Score:** 60-75 → **85-95** (+25-30 points)

### Real-World Scenarios

#### Homepage (Image Heavy)

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| Load Time | 4.2s | 1.4s | **-67%** |
| Images Downloaded | 2.5MB | 800KB | **-68%** |
| LCP | 3.8s | 1.2s | **-68%** |

#### Blog Post (Content Heavy)

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| Load Time | 3.1s | 1.1s | **-65%** |
| CSS Blocking | 850ms | 150ms | **-82%** |
| FCP | 1.8s | 0.5s | **-72%** |

#### Archive/Listing Page

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| Load Time | 4.8s | 1.6s | **-67%** |
| Thumbnails | All at once | Lazy loaded | **-70% initial** |
| Prefetch Benefit | 0s | -1.2s | Next page instant |

---

## Implementation Notes

### Code Organization

All performance code should live in:
```
src/functions/performance.php
```

Include in main functions.php:
```php
require_once __DIR__ . '/src/functions/performance.php';
```

### Coding Standards

- Follow existing WordPress coding standards
- Add inline documentation
- Use meaningful function names with `dream_` prefix
- Cache aggressively, invalidate intelligently
- Gracefully degrade if files missing

### Testing Approach

1. **Implement one optimization at a time**
2. **Test thoroughly before moving to next**
3. **Measure performance impact of each**
4. **Document actual vs. expected results**

### Rollback Plan

Each optimization is independent and can be disabled:

```php
// Disable lazy loading
remove_filter('wp_lazy_loading_enabled', 'dream_disable_lazy_loading_for_important_images');

// Disable critical CSS
remove_action('wp_head', 'dream_enqueue_critical_css');

// Disable preloading
remove_action('wp_head', 'dream_smart_asset_preloading');

// Disable service worker
remove_action('wp_enqueue_scripts', 'dream_enqueue_service_worker');
```

### How to Revert Service Worker Implementation

**If you need to completely remove the service worker:**

#### 1. Disable Service Worker Enqueue (Immediate)

In `src/functions/performance.php`, comment out or remove:

```php
// Comment out these lines to disable service worker
// add_action( 'wp_enqueue_scripts', 'dream_enqueue_service_worker' );
```

This immediately stops new visitors from registering the service worker.

#### 2. Unregister Existing Service Workers (Users)

Existing users already have the service worker installed. To unregister it, **temporarily** add this to your theme:

```php
// Add to src/functions/performance.php TEMPORARILY

add_action( 'wp_footer', 'dream_unregister_service_worker' );
function dream_unregister_service_worker() {
	?>
	<script>
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.getRegistrations().then(function(registrations) {
			for(let registration of registrations) {
				if (registration.active && registration.active.scriptURL.includes('sw.js')) {
					registration.unregister().then(function(success) {
						console.log('[SW] Service worker unregistered:', success);
						// Clear all caches
						caches.keys().then(function(cacheNames) {
							return Promise.all(
								cacheNames.map(function(cacheName) {
									return caches.delete(cacheName);
								})
							);
						}).then(function() {
							console.log('[SW] All caches cleared');
						});
					});
				}
			}
		});
	}
	</script>
	<?php
}
```

**Important:** Remove this code after 1-2 weeks (once most users have visited and had their service workers unregistered).

#### 3. Remove Service Worker Files (Optional)

After unregistering, you can optionally delete these files:

```bash
# Delete service worker source files
rm src/js/sw.js
rm src/js/register-sw.js

# Delete built service worker files
rm sw.js
rm dist/wp/js/register-sw.bundle.js
```

#### 4. Remove from Webpack Config (Optional)

In `webpack.config.js`, remove:

```javascript
// Remove this from entry:
'register-sw': [`${paths.src}/js/register-sw.js`],

// Remove this plugin:
new InjectManifest({
  swSrc: `${paths.src}/js/sw.js`,
  swDest: path.resolve(__dirname, 'sw.js'),
  // ... rest of config
}),
```

#### 5. Remove from cache.php (Optional)

In `src/functions/cache.php`, remove:

```php
// Remove service worker version constant
if (!defined('DREAM_SW_VERSION')) {
	define('DREAM_SW_VERSION', '1.0.0');
}
```

#### 6. Remove from performance.php (Optional)

In `src/functions/performance.php`, remove the entire Service Worker section (lines 67-94).

#### 7. Uninstall Workbox Packages (Optional)

```bash
npm uninstall workbox-precaching workbox-routing workbox-strategies workbox-expiration workbox-webpack-plugin
```

#### Testing Unregistration

**To verify service worker is removed:**

1. Open Chrome DevTools (F12)
2. Go to **Application** tab → **Service Workers**
3. Should show "No service workers" or service worker with status "deleted"
4. Go to **Application** tab → **Cache Storage**
5. Should show "No caches" or all caches deleted
6. Reload page - service worker should not re-register

---

## Next Steps

1. [x] **Review this document** ✅
2. [ ] **Begin Phase 1: Lazy Loading** (1-2 hours)
3. [ ] **Discuss critical CSS files** before Phase 2
4. [ ] **Begin Phase 2: Critical CSS** (4-6 hours)
5. [ ] **Begin Phase 3: Asset Preloading** (4-6 hours)
6. [ ] **Begin Phase 4: Service Worker** (6-8 hours)
7. [ ] **Measure and iterate**

---

**Document Version:** 1.1
**Last Updated:** 2025-10-13
**Status:** Ready for Phase 1 implementation

**Decisions Made:**
- ✅ Service Worker: Workbox library
- ⚠️ Critical CSS files: Will discuss before Phase 2
