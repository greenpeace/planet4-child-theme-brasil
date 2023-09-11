<?php

/*
 * Captures parameters from URL and shows it inside a shortcode on front-end.
 * 
 * Usage: add [URLParam param="your-parameter-name"] to your page or post.
 */
function URLParam($atts)
{
    extract(shortcode_atts(array(
        'param' => 'param',
    ), $atts));
    return $_GET[$param];
}
add_shortcode('URLParam', 'URLParam');

