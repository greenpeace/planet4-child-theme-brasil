<?php
/**
 * Injects the Handtalk script on WP footer
 */
function gpbr_add_handtalk_script()
{
    ?>
    <script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
    <script>
        var ht = new HT({
        token: "40820ef34c22e3e84ffb669c7e31258d",
        pageSpeech: true,
        avatar: "MAYA",
        maxTexSize: 1000  
        });
    </script>
    <?php
}

add_action('wp_footer', 'gpbr_add_handtalk_script', 99999);
