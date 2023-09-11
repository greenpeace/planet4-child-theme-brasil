<?php
/*
 * Creates the brazilian phone mask for phone inputs
 */ 

 function gpbr_add_brazilian_phone_mask_gf($phone_formats)
 {
     $phone_formats['br'] = array(
         'label' => 'Brasileiro com 9 dígitos e DDD',
         'mask' => '99-99999-9999',
         'regex' => '/^(1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])-[9][0-9]{4}-[0-9]{4}$/',
         'error_message_setting' => 'Houve um erro com a submissão, verifique o campo em destaque. O telefone deve conter um DDD válido e ser no formato celular brasileiro.'
        );
     return $phone_formats;
 }
 
 add_filter('gform_phone_formats', 'gpbr_add_brazilian_phone_mask_gf', 10, 2);