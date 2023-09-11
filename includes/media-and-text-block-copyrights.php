<?php

/**
 *   Displays the image copyright to the media block.
 */

function media_block_caption( $block_content, $block ) {
    if ( $block['blockName'] === 'core/media-text' ) {
        $mediaId = $block['attrs']['mediaId'];
        if($mediaId){
            $image = get_post($mediaId);
            $credits = $image->$credits;
            if($credits){
                $content = str_replace('</figure>', '<figcaption>' . $credits . '</figcaption></figure>', $block_content);
                return $content;
            }
        }
    }
    return $block_content;
}
 
add_filter( 'render_block', 'media_block_caption', 10, 2 );