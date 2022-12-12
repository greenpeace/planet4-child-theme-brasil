<?php
/**
 * Allows the loop query block usage
 */
add_filter('allowed_block_types_all', 'p4_brasil_allowed_blocks', 11, 2);

function p4_brasil_allowed_blocks($allowed_blocks, $context) {
    if ($context->post && $context->post->post_type === 'page') {
        $allowed_blocks = array_merge($allowed_blocks, ['core/query', 'core/post-featured-image', 'core/post-excerpt']);
    };
    return $allowed_blocks;
}