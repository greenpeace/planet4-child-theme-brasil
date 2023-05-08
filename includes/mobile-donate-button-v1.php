<?php

function add_mobile_custom_donate_button() {
    // Get the page's HTML code
    $html = ob_get_contents();
    ob_end_clean();

    // Search for the nav-mobile-menu element
    $pos = strpos($html, 'nav-mobile-menu');

    // If the element is found, add the custom button code after it
    if ($pos !== false) {
        $html = substr_replace($html, "
            <div id='donate-message-div' class='container text-center donate-message gpbr-remove-external-link external-link'>
            <div class='row'>
                <div class='col'>
                    <a class='btn-donate-custom' href='#'>Doe agora</a>        
                </div>
            </div>
        </div>
        <style>
            @media screen and (min-width: 600px) {
                #donate-message-div {
                    display: none;
                }
            }
            .btn-donate-custom {
                background-color: #f26b34;
                border: none;
                color: #fff;
                text-align: center;
                text-decoration: none;
                border-radius: 4px;
                font-size: 16px;
                padding-left: 30px;
                padding-right: 30px;
                padding-top: 10px;
                padding-bottom: 10px;
                width: 170px;
                font-family: Roboto;
                font-weight: 500;
            }
            .btn-donate-custom:visited {
                color: #fff;
            }      
            .donate-message {
                padding: 10px;
                max-width: 100%;
            }
            #nav-mobile {
                margin-bottom: 2em;
            }

        </style>
        <script>
            function hide(obj) {
                var el = document.getElementById('donate-message-div');
                el.style.display = 'none';
            }
        </script>
        ", $pos + 17, 0);
    }

    // Output the modified HTML code
    echo $html;
}
add_action('wp_footer', 'add_mobile_custom_donate_button');