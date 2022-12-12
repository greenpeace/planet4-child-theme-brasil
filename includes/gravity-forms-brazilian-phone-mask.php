<?php

/*
 * Creates the brazilian phone mask for phone inputs
 * added by rick - GPBR
 */ 

function gpbr_add_brazilian_phone_mask_gf($phone_formats)
{
    $phone_formats['br'] = array(
        'label' => 'Brasileiro com 9 dígitos e DDD',
        'mask' => '99-99999-9999',
        'regex' => '/^[1-9]{2}-9[0-9]{4}-[0-9]{4}$/',
    );
    return $phone_formats;
}

add_filter('gform_phone_formats', 'gpbr_add_brazilian_phone_mask_gf', 10, 2);