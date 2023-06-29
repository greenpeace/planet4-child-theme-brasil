<?php

function gpbr_add_mobile_donate_card()
{
    ?>
    <script>
        $(document).ready(function() {
    // Find the specific element by its ID
    var targetElement = $('header');

    // Create the new code block
    var newCodeBlock = `
        <style>
            .donate-card {
                width: 100%;
                max-width: 100%;
                display: none;
                background-color: #fff;
                margin-top: 60px;
            }

            @media (max-width: 767px) {
                /* Styles for mobile devices */
                .donate-card {
                    display: block;
                    /* Show the card on mobile devices */
                }

                #nav-mobile {
                    /* Hide the mobile menu by default */
                    display: none;
                }

                #nav-mobile.show {
                    display: flex;
                    /* Show the mobile menu when 'show' class is added */
                }
            }

            .donate-card-body {
                display: flex;
                justify-content: space-between;
            }

            .donate-card-text {
                font-size: 16px;
                margin: 0;
                padding: 2em;
                font-family: Roboto;
                color: #000;
            }

            .donate-btn-group {
                display: flex;
                align-items: center;
            }

            .donate-btn {
                margin-right: 10px;
            }

            .donate-close-button {
                background-color: transparent;
                border: none;
                cursor: pointer;
                font-size: 10px;
                margin-right: 15px;
                padding-right: 0;
                margin-left: 10px;
                padding-bottom: 85px;
                color: #000;
            }

            #gpbr-mobile-donate-button-mvp {
                min-width: 145px;
            }
            @media (max-width: 991px)
                .with-mobile-tabs~:not(.page-header)+.page-content {
                    padding-top: 0px !important;
                }

        .page-content.no-page-title {
            padding-top: 0px !important;
        }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var closeButton = document.querySelector('.donate-close-button');
                var donateCard = document.querySelector('.donate-card');
                var navMobile = document.querySelector('#nav-mobile');

                closeButton.addEventListener('click', function () {
                    donateCard.style.display = 'none'; // Hide the entire donate card
                    navMobile.classList.add('show'); // Show the mobile menu

                    // Store the state in local storage
                    localStorage.setItem('donateCardVisible', 'false');
                });

                // Retrieve the state from local storage
                var donateCardVisible = localStorage.getItem('donateCardVisible');
                if (donateCardVisible === 'true') {
                    donateCard.style.display = 'block'; // Show the donate card
                }
            });
        </script>

        <div class='donate-card'>
            <div class='donate-card-body'>
                <div>
                    <p class='donate-card-text'>O meio ambiente precisa de <b>você</b>.</p>
                </div>
                <div class='donate-btn-group'>
                    <a href='#' id='gpbr-mobile-donate-button-mvp' data-ga-category='Donation Card' data-ga-action='Donate' data-ga-label='donate_mobile' aria='botão para fazer doação ao Greenpeace' class='btn-donate btn'>Doe agora</a>
                    <a type='button' class='donate-close-button gpbr-remove-external-link' data-ga-category='Donation Card' data-ga-action='Close menu' data-ga-label='donate_mobile' aria-label='Fechar mensagem de doação'>✕</a>
                </div>
            </div>
        </div>
    `;

    targetElement.after(newCodeBlock);
    });
</script>
    <?php
}

add_action('wp_footer', 'gpbr_add_mobile_donate_card');