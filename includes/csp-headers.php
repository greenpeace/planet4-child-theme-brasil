<?php

/**
 * Update the CSP rules for Perto Digital Accessibility plugin without overwritting the master theme Headers 
 */

add_action('wp_headers', function (array $headers): array {
    if (empty($headers['Content-Security-Policy'])) {
        return $headers;
    }

    $directives = [];
    foreach (explode(';', $headers['Content-Security-Policy']) as $rule) {
        $rule = trim($rule);
        if ($rule === '') {
            continue;
        }
        $parts = preg_split('/\s+/', $rule, 2);
        $directives[$parts[0]] = $parts[1] ?? '';
    }

    if (!isset($directives['worker-src'])) {
        $fallback = $directives['script-src'] ?? $directives['default-src'] ?? "'self' https:";
        $directives['worker-src'] = trim(str_replace("'unsafe-inline'", '', $fallback));
    }

    foreach (['worker-src', 'connect-src', 'img-src'] as $target) {
        $sources = preg_split('/\s+/', trim($directives[$target] ?? ''), -1, PREG_SPLIT_NO_EMPTY);
        if (!in_array('blob:', $sources, true)) {
            $sources[] = 'blob:';
        }
        $directives[$target] = implode(' ', $sources);
    }

    $rebuilt = [];
    foreach ($directives as $name => $value) {
        $rebuilt[] = trim("$name $value");
    }

    $headers['Content-Security-Policy'] = implode('; ', $rebuilt) . ';';

    return $headers;
}, 11);