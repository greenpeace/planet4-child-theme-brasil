<?php
function inject_convert_script() {
    ?>
<!-- begin Convert Experiences code-->
 <script type="text/javascript" src="//cdn-4.convertexperiments.com/v1/js/100414404-100415998.js?environment=staging"></script>
 <!-- end Convert Experiences code -->
    <?php
}
add_action('wp_head', 'inject_convert_script', 5); // Prioridade 5 para carregar logo após <title>

