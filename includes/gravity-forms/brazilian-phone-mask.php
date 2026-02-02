<?php
/*
 * Creates the brazilian phone mask for phone inputs in international format
 */ 
function gpbr_add_brazilian_phone_mask_gf($phone_formats)
{
    $phone_formats['br'] = array(
        'label' => 'Brasileiro com 9 dígitos e DDD (Internacional)',
        'mask' => '+55-99-99999-9999',
        'regex' => '/^\+55(1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])[9][0-9]{8}$/',
        'error_message_setting' => 'Houve um erro com a submissão, verifique o campo em destaque. O telefone deve estar no formato +5511999999999 com um DDD válido e 9 dígitos no número.'
    );
    return $phone_formats;
}

add_filter('gform_phone_formats', 'gpbr_add_brazilian_phone_mask_gf', 10, 2);