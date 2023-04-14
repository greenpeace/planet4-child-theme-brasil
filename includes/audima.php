<?php

function add_audima_after_post_title($title) {
    if (is_single() && in_the_loop() && is_main_query()) { // check if it's a blog post
        $title .= '<div id=\'audimaWidget\'></div><script src=\'https://audio4.audima.co/audima-widget.js\'></script>
';
    }
    return $title;
}
add_filter('the_title', 'add_audima_after_post_title');

