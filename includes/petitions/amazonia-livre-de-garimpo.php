<?php

/**
 *  Amazonia livre do Garimpo - Check if user is underage at Gravity Forms birthdate input
 */
$field = GFFormsModel::get_field($form, 1);
$date_type = $field->dateType;

add_filter('gform_field_validation_17_8', function ($result, $value, $form, $field) {
    if ($result['is_valid']) {
        if (is_array($value)) {
            $value = array_values($value);
        }
        $date_value = GFFormsModel::prepare_date($field->dateFormat, $value);
        $originalDate = $date_value;
        $newDate = date("d-m-Y", strtotime($originalDate));

        $today = new DateTime();
        $diff = $today->diff(new DateTime($newDate));
        $age = $diff->y;

        if ($age < 18) {
            $result['is_valid'] = false;
            $result['message'] = 'Desculpe, apenas maiores de 18 anos podem assinar.';
        }
    }

    return $result;
}, 10, 4);