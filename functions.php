<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}
/** 
* Allows the loop query block usage
*/
add_filter( 'allowed_block_types_all', 'p4_brasil_allowed_blocks', 11, 2 );

function p4_brasil_allowed_blocks( $allowed_blocks, $context ) {
    if ( $context->post && $context->post->post_type === 'page' ) {
        $allowed_blocks = array_merge( $allowed_blocks, ['core/query-loop', 'core/post-featured-image', 'core/post-excerpt']);
    };
    return $allowed_blocks;
}
