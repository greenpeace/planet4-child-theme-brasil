<?php
/**
 * Adding the Handtalk Plugin for trial
 */
function gpbr_add_handtalk_script()
{
    ?>
    <script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
    <script>
        var ht = new HT({
            token: "40820ef34c22e3e84ffb669c7e31258d"
        });
    </script>
    <?php
}

add_action('wp_footer', 'gpbr_add_handtalk_script', 99999);
