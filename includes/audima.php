<?php

function add_audima_script() {
    if (is_single() && in_the_loop() && is_main_query()) { // check if it's a blog post
        echo '<script async>
            (function() {
                var shareButtons = document.querySelector(".share-buttons");
                if (shareButtons) {
                    var audimaWidget = document.createElement("div");
                    audimaWidget.id = "audimaWidget";
                    shareButtons.parentNode.insertBefore(audimaWidget, shareButtons.nextSibling);
                    var audimaScript = document.createElement("script");
                    audimaScript.src = "https://audio4.audima.co/audima-widget.js";
                    shareButtons.parentNode.insertBefore(audimaScript, shareButtons.nextSibling);
                }
            })();
        </script>';
    }
}
add_action('wp_footer', 'add_audima_script');

