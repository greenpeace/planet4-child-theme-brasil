<?php
function inject_convert_script() {
    // Pega a URL atual completa
    $current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    // Verifica se a URL contém 'www-dev'
    if (strpos($current_url, 'www-dev') !== false) {
        // Script para ambiente com 'www-dev'
        ?>
        <!-- begin Convert Experiences code (staging) -->
        <script data-cfasync="false" type="text/javascript" src="//cdn-4.convertexperiments.com/v1/js/100414404-100415998.js?environment=staging"></script>
        <script>
            var refObject = window['convert']['data']['experiments']
    	    for (var key in window["convert"]["currentData"]["experiments"]) {
		    if (!window["convert"]["currentData"]["experiments"].hasOwnProperty(key)) {
		    	continue;
		    }}
            
    	    var currentExperiment = window["convert"]["currentData"]["experiments"][key];
	        var curExperimentName = refObject[key] && refObject[key].n ? refObject[key].n : "unknown experiment name";
	        curExperimentName = curExperimentName.replace("Test #", "Test ");
	        var curVariant = currentExperiment['variation_name'] ? currentExperiment['variation_name'] : "unknown variant";
	        curVariant = curVariant.replace("Var #", "Variation ");
	        mixpanel.track('Convert_Experiences', {'Experiment name': curExperimentName, 'Variant name': curVariant})
        </script>
        <!-- end Convert Experiences code -->
        <?php
    } else if (strpos($current_url, 'planet4.test') !== false){
        // Script para ambiente sem 'www-dev'
        ?>
        <!-- begin Convert Experiences code--><script type="text/javascript" src="//cdn-4.convertexperiments.com/v1/js/100414404-100415998.js?environment=staging"></script><!-- end Convert Experiences code -->
        <script>
            var refObject = window['convert']['data']['experiments']
    	    for (var key in window["convert"]["currentData"]["experiments"]) {
		    if (!window["convert"]["currentData"]["experiments"].hasOwnProperty(key)) {
		    	continue;
		    }}
            
    	    var currentExperiment = window["convert"]["currentData"]["experiments"][key];
	        var curExperimentName = refObject[key] && refObject[key].n ? refObject[key].n : "unknown experiment name";
	        curExperimentName = curExperimentName.replace("Test #", "Test ");
	        var curVariant = currentExperiment['variation_name'] ? currentExperiment['variation_name'] : "unknown variant";
	        curVariant = curVariant.replace("Var #", "Variation ");
	        mixpanel.track('Convert_Experiences', {'Experiment name': curExperimentName, 'Variant name': curVariant})
        </script>

        <?php
    }

    else {
                ?>
        <!-- begin Convert Experiences code--><script type="text/javascript" src="//cdn-4.convertexperiments.com/v1/js/100414404-100415998.js?environment=production"></script><!-- end Convert Experiences code -->
        <script>
            var refObject = window['convert']['data']['experiments']
    	    for (var key in window["convert"]["currentData"]["experiments"]) {
		    if (!window["convert"]["currentData"]["experiments"].hasOwnProperty(key)) {
		    	continue;
		    }}
            
    	    var currentExperiment = window["convert"]["currentData"]["experiments"][key];
	        var curExperimentName = refObject[key] && refObject[key].n ? refObject[key].n : "unknown experiment name";
	        curExperimentName = curExperimentName.replace("Test #", "Test ");
	        var curVariant = currentExperiment['variation_name'] ? currentExperiment['variation_name'] : "unknown variant";
	        curVariant = curVariant.replace("Var #", "Variation ");
	        mixpanel.track('Convert_Experiences', {'Experiment name': curExperimentName, 'Variant name': curVariant})
        </script>

        <?php

    }
}
add_action('wp_head', 'inject_convert_script', 1); // Prioridade 1 para carregar no topo
