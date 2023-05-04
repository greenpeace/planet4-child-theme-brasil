<?php
function add_mobile_custom_donate_button() {
    // Get the page's HTML code
    $html = ob_get_contents();
    ob_end_clean();

    // Search for the nav-mobile-menu element
    $pos = strpos($html, 'nav-mobile-menu');

    // If the element is found, add the custom button code after it
    if ($pos !== false) {
        $html = substr_replace($html, "<div><a class='btn-donate-custom' href='#'>Doe agora</a></div>
        <style>
            .btn-donate-custom {
                background-color: #f26b34;
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: block;
                font-size: 16px;
                padding-left: 30px;
                padding-right: 30px;
                padding-top: 10px;
                padding-bottom: 10px;
                margin-left: 2em;
                margin-right: auto;
            }
        </style>", $pos + 17, 0);
    }

    // Output the modified HTML code
    echo $html;
}
add_action('wp_footer', 'add_mobile_custom_donate_button');
