<?php

/*
 * Captures parameters from URL and shows it inside a shortcode on front-end
 */
function URLParam($atts)
{
    extract(shortcode_atts(array(
        'param' => 'param',
    ), $atts));
    return $_GET[$param];
}
add_shortcode('URLParam', 'URLParam');

