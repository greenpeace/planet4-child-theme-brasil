<?php

/**
 * Update the CSP rules and allow the load of blob objects
 */

add_action('wp_headers', function ($headers): array {
    if (empty($headers['Content-Security-Policy'])) {
        return $headers;
    }
    $headers['Content-Security-Policy'] .= "; img-src 'self' blob: * data: *;";
    return $headers;
}, 11, 1);
