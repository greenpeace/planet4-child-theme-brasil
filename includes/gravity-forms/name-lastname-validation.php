<?php

add_filter( 'gform_field_validation', function ( $result, $value, $form, $field ) {
    if ( $field->type == 'name' ) {

        // Input values
        $fullName = rgar( $value, $field->id . '.3' );
         
        if ( empty( $fullName )) {
            $result['is_valid'] = false;
            $result['message']  = empty( $field->errorMessage ) ? __( 'O campo nome é obrigatório. Por favor, insira seu nome completo.', 'gravityforms' ) : $field->errorMessage;
        } else if (preg_match('/^[a-zA-ZÀ-ÿỹẽ]+([\',. -][a-zA-ZÀ-ÿỹẽ]+)*$/u', $fullName)) { //check for letters only
            $result['is_valid'] = false;
            $result['message']  = empty( $field->errorMessage ) ? __( 'Full name must ony contains letters.', 'gravityforms' ) : $field->errorMessage;
        } else {
            $result['is_valid'] = true;
            $result['message']  = '';
        }
    }
    return $result; //return results
}, 10, 4 );