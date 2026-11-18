<?php

/**
 * Update the CSP rules for Perto Digital Accessibility plugin
 */

add_action('wp_headers', function ($headers): array {
    $csp = [
        "default-src 'self' https:",
        "script-src 'self' https: 'unsafe-inline' 'unsafe-eval' blob:",
        "style-src 'self' https: 'unsafe-inline'",
        "worker-src 'self' blob:",
        "connect-src 'self' https: blob: wss:",
        "img-src 'self' data: https: blob:",
        "frame-src 'self' https:",
        "frame-ancestors 'self'",
    ];

    $headers['Content-Security-Policy'] = implode('; ', $csp) . ';';
    $headers['X-Content-Security-Policy'] = $headers['Content-Security-Policy'];

    return $headers; }, 11, 1);
?>