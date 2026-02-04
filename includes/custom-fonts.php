<?php

function enqueue_custom_fonts() {
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&display=swap', []);
}
add_action('wp_head', 'enqueue_custom_fonts');