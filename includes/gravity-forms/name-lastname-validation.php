<?php

add_filter( 'gform_field_validation', 'validar_nome_sobrenome', 10, 4 );
function validar_nome_sobrenome( $result, $value, $form, $field ) {
    if ( $field->type == 'name' ) { // Verifica se o campo é do tipo "name"
        $pattern = '/^[a-zA-ZÀ-ÿỹẽ]+([\',. -][a-zA-ZÀ-ÿỹẽ]+)*$/u'; // Expressão regular para aceitar letras, acentuações, espaço, hífen, vírgula, ponto, apóstrofo e espaço

        if ( ! preg_match( $pattern, $value ) ) {
            $result['is_valid'] = false;
            $result['message'] = 'O nome e sobrenome devem conter no mínimo 2 caracteres e não podem possuir caracteres especiais ou números.';
        }
    }

    return $result;
}
