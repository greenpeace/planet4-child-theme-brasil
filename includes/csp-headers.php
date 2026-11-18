<?php

/**
 * Update the CSP rules for Perto Digital Accessibility plugin without overwritting the master theme Headers 
 * Contains a specific rule to ensure the SST loads properly
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

    $default_fallback = $directives['default-src'] ?? "'self' https: 'unsafe-inline'";

    if (!isset($directives['worker-src'])) {
        $directives['worker-src'] = trim(str_replace("'unsafe-inline'", '', $default_fallback));
    }
    if (!isset($directives['script-src'])) {
        $directives['script-src'] = $default_fallback;
    }
    if (!isset($directives['frame-src'])) {
        $directives['frame-src'] = trim(str_replace("'unsafe-inline'", '', $default_fallback));
    }

    $additions = [
        'worker-src'  => ['blob:'],
        'connect-src' => ['blob:', 'https://sgtmbr.greenpeace.org'],
        'img-src'     => ['blob:', 'https://sgtmbr.greenpeace.org'],
        'script-src'  => ['https://sgtmbr.greenpeace.org'],
        'frame-src'   => ['https://sgtmbr.greenpeace.org'],
    ];

    foreach ($additions as $target => $items) {
        $sources = preg_split('/\s+/', trim($directives[$target] ?? ''), -1, PREG_SPLIT_NO_EMPTY);
        foreach ($items as $item) {
            if (!in_array($item, $sources, true)) {
                $sources[] = $item;
            }
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