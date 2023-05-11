<?php

// checks if the page contains "/obrigado/" in the URL. if it does, the noindex tag will be inserted at the page header

function noindex_confirmation_pages() {
    if (is_page() && stripos($_SERVER['REQUEST_URI'], '/obrigado/') !== false) {
        echo '<meta name="robots" content="noindex">';
    }
}
add_action('wp_head', 'noindex_confirmation_pages', 1);