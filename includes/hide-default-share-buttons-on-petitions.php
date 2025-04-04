<?php

function hide_default_share_buttons_on_petitions() {
    if (strpos($_SERVER['REQUEST_URI'], '/apoie/') !== false) {
        echo '<style>.share-buttons { display: none !important; }</style>';
    }
}
add_action('wp_footer', 'hide_default_share_buttons_on_petitions');
