<?php

function gpbr_add_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'gpbr_add_jquery');