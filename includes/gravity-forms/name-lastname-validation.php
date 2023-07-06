<?php

add_filter( 'gform_field_validation', 'name_lastname_validation', 99, 4 );
function name_lastname_validation( $result, $value, $form, $field ) {
    if ( $field->type == 'name' ) { // Verifica se o campo é do tipo "name"
        $pattern = "/^[a-zA-ZÀ-ÿỹẽ]+([\',. -][a-zA-ZÀ-ÿỹẽ]+)*$/u";

        if ( ! preg_match( $pattern, $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'O nome e sobrenome devem conter no mínimo 2 caracteres e não podem possuir caracteres especiais ou números.';
        }
    }

    return $result;
}
