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
    } else {
        ?>
        <!-- begin Convert Experiences code--><script type="text/javascript" src="//cdn-4.convertexperiments.com/v1/js/100414404-100415998.js?environment=production"></script><!-- end Convert Experiences code -->
        <script>
            (function () {
            var DEBUG = false;      // coloque true pra logar no console
            var POLL_MS = 500;      // intervalo de checagem
            var MAX_TRIES = 60;     // ~30s (60 * 500ms)
            function log() { if (DEBUG && window.console) console.log('[MixpanelExp]', [].slice.call(arguments)); }
            function safeStr(v, fb) { return (v == null) ? fb : String(v); }
            function trackExposures() {
                try {
                var cv = window.convert;
                var mp = window.mixpanel;
                if (!cv?.currentData?.experiments || !cv?.data?.experiments) { log('Convert não pronto'); return false; }
                if (!mp?.track) { log('Mixpanel não pronto'); return false; }

                var refObject   = cv.data.experiments || {};
                var experiments = cv.currentData.experiments || {};
                var sent = false;

                Object.keys(experiments).forEach(function (key) {
                    var exp = experiments[key] || {};
                    var expName = safeStr(refObject[key] && refObject[key].n, 'unknown experiment name').replace('Test #', 'Test ');
                    var varName = safeStr(exp.variation_name, 'unknown variant').replace('Var #', 'Variation ');

                    // Mixpanel pede strings
                    if (typeof expName !== 'string' || typeof varName !== 'string') return;

                    // Dedup por experimento+variante no navegador
                    var dedupeKey = 'mixpanel:exposure:' + key + ':' + varName;
                    try { if (localStorage.getItem(dedupeKey)) { log('dedup', dedupeKey); return; } } catch (_) {}

                    mp.track('$experiment_started', {
                    'Experiment name': expName,
                    'Variant name': varName
                    });
                    sent = true;

                    try { localStorage.setItem(dedupeKey, '1'); } catch (_) {}
                    log('tracked', expName, varName);
                });

                return sent; // true se mandou algo, false caso contrário
                } catch (e) {
                if (window.console?.warn) console.warn('Mixpanel exposure tracking error:', e);
                return false;
                }
            }

            function startPolling() {
                var tries = 0;
                var iv = setInterval(function () {
                tries++;
                if (trackExposures() || tries >= MAX_TRIES) clearInterval(iv);
                }, POLL_MS);
            }

            // Primeira carga (sem PJAX)
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', startPolling);
            } else {
                startPolling();
            }

            // OPCIONAL: se tiver jQuery, reexecuta após AJAX do WordPress (widgets/blocos que carreguem tardiamente)
            if (window.jQuery) {
                jQuery(document).ajaxComplete(function () {
                // tenta de novo só uma vez rápido; se Convert já estiver pronto, dispara; se não, ignora silenciosamente
                setTimeout(trackExposures, 0);
                });
            }

            // expõe função global caso queira chamar manualmente
            window.trackConvertExposure = trackExposures;
            })();
        </script>


        <?php

    }
}
add_action('wp_head', 'inject_convert_script', 1); // Prioridade 1 para carregar no topo
