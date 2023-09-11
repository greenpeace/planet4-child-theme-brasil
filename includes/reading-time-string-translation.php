<?php
/**
 * Injects a jQuery for a temporary translation in the reading time string
 */
function gpbr_reading_time_string_translation()
{
    ?>
    <script>
        $("span").each(function() {
            var text = $(this).text();
            text = text.replace("1 minutos", "1 minuto");
            $(this).text(text);
        });
    </script>
    <?php
}

add_action('wp_footer', 'gpbr_reading_time_string_translation', 99999);