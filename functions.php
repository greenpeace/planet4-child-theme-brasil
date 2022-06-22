<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}
/** 
* Allows the loop query block usage
*/
add_filter( 'allowed_block_types_all', 'p4_brasil_allowed_blocks', 11, 2 );

function p4_brasil_allowed_blocks( $allowed_blocks, $context ) {
    if ( $context->post && $context->post->post_type === 'page' ) {
        $allowed_blocks = array_merge( $allowed_blocks, ['core/query', 'core/post-featured-image', 'core/post-excerpt']);
    };
    return $allowed_blocks;
}

/**
 * Allows the Dashicons for non-logged users
 */

add_action( 'wp_enqueue_scripts', 'dashicons_front_end' );

function dashicons_front_end() {

   wp_enqueue_style( 'dashicons' );

}

/**
 *  Precisamos proteger a Amazônia - Check if user is underage at Gravity Forms birthdate input
 */
$field = GFFormsModel::get_field( $form, 1 );
$date_type = $field->dateType;

add_filter( 'gform_field_validation_3_8', function ( $result, $value, $form, $field ) {
    if ( $result['is_valid'] ) {
        if ( is_array( $value ) ) {
            $value = array_values( $value );
        }
        $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
  
        $today = new DateTime();
        $diff  = $today->diff( new DateTime( $date_value ) );
        $age   = $diff->y;
  
        if ( $age < 18 ) {
            $result['is_valid'] = false;
            $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
        }
    }

    return $result;
}, 10, 4 );


/**
 *  Manifesto pela agroecologia - Check if user is underage at Gravity Forms birthdate input
 */
$field = GFFormsModel::get_field( $form, 1 );
$date_type = $field->dateType;

add_filter( 'gform_field_validation_5_27', function ( $result, $value, $form, $field ) {
    if ( $result['is_valid'] ) {
        if ( is_array( $value ) ) {
            $value = array_values( $value );
        }
        $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
  
        $today = new DateTime();
        $diff  = $today->diff( new DateTime( $date_value ) );
        $age   = $diff->y;
  
        if ( $age < 18 ) {
            $result['is_valid'] = false;
            $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
        }
    }

    return $result;
}, 10, 4 );

/**
 *  Amazônia que precisamos - Check if user is underage at Gravity Forms birthdate input
 */
$field = GFFormsModel::get_field( $form, 1 );
$date_type = $field->dateType;

add_filter( 'gform_field_validation_4_23', function ( $result, $value, $form, $field ) {
    if ( $result['is_valid'] ) {
        if ( is_array( $value ) ) {
            $value = array_values( $value );
        }
        $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
  
        $today = new DateTime();
        $diff  = $today->diff( new DateTime( $date_value ) );
        $age   = $diff->y;
  
        if ( $age < 18 ) {
            $result['is_valid'] = false;
            $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
        }
    }

    return $result;
}, 10, 4 );

