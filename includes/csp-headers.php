<?php

/**
 * Update the CSP rules for Perto Digital Accessibility plugin
 */

add_action('wp_headers', function ($headers): array {
    $csp = [
        "default-src 'self' https: 'unsafe-inline'",
        "worker-src 'self' blob:",
        "connect-src 'self' https: blob: wss:",
        "img-src 'self' data: https: blob:",
        "frame-ancestors 'self'",
    ];

    $headers['Content-Security-Policy'] = implode('; ', $csp) . ';';
    $headers['X-Content-Security-Policy'] = $headers['Content-Security-Policy'];

    return $headers; }, 11, 1);
?>