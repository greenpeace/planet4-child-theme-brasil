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
 * GPBR - check if user is underage 
 */

add_filter('gform_field_validation_1_4', 'verify_minimum_age');
function verify_minimum_age($validation_result){

    // retrieve the $form
    $form = $validation_result['form'];

        // date of birth is submitted in field 5 in the format YYYY-MM-DD
        // change the 5 here to your field ID
        $dob = rgpost('input_4');


        // this the minimum age requirement we are validating
        $minimum_age = 18;
        
        // yyyy/mm/dd
        //dd/mm/yyyy

        // calculate age in years like a human, not a computer, based on the same birth date every year
        $age = date('Y') - substr($dob, 6, 4);
        if (strtotime(date('d-m-Y')) - strtotime(date('Y') . substr($dob, 2, 6)) < 0){
            $age--; 
        }
 
    // is $age less than the $minimum_age?
    if( $age < $minimum_age ){
 
        // set the form validation to false if age is less than the minimum age
        $validation_result['is_valid'] = false;
 
        // find field with ID of 5 and mark it as failed validation
        foreach($form['fields'] as &$field){
 
            // NOTE: replace the id with the field you would like to mark invalid
            if($field['id'] == '4'){
                $field['failed_validation'] = true;
                $field['validation_message'] = "Sorry, you must be at least $minimum_age years of age to join. You're $age years old.";
                break;
            }
 
        }
 
    }
    // assign modified $form object back to the validation result
    $validation_result['form'] = $form;
    return $validation_result;
}


// /**
//  *  Amazônia que precisamos - Check if user is underage at Gravity Forms birthdate input
//  */
// $field = GFFormsModel::get_field( $form, 1 );
// $date_type = $field->dateType;

// add_filter( 'gform_field_validation_4_23', function ( $result, $value, $form, $field ) {
//     if ( $result['is_valid'] ) {
//         if ( is_array( $value ) ) {
//             $value = array_values( $value );
//         }
//         $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
//         $originalDate = $date_value;
//         $newDate = date("d-m-Y", strtotime($originalDate));

//         $today = new DateTime();
//         $diff  = $today->diff( new DateTime( $newDate ) );
//         $age   = $diff->y;
  
//         if ( $age < 18 ) {
//             $result['is_valid'] = false;
//             $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
//         }
//     }

//     return $result;
// }, 10, 4 );
// 
// /**
//  *  Manifesto pela agroecologia - Check if user is underage at Gravity Forms birthdate input
//  */
// $field = GFFormsModel::get_field( $form, 1 );
// $date_type = $field->dateType;

// add_filter( 'gform_field_validation_5_27', function ( $result, $value, $form, $field ) {
//     if ( $result['is_valid'] ) {
//         if ( is_array( $value ) ) {
//             $value = array_values( $value );
//         }
//         $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
//         $originalDate = $date_value;
//         $newDate = date("d-m-Y", strtotime($originalDate));

//         $today = new DateTime();
//         $diff  = $today->diff( new DateTime( $newDate ) );
//         $age   = $diff->y;
  
//         if ( $age < 18 ) {
//             $result['is_valid'] = false;
//             $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
//         }
//     }

//     return $result;
// }, 10, 4 );

// /**
//  *  Precisamos proteger a Amazônia - Check if user is underage at Gravity Forms birthdate input
//  */
// $field = GFFormsModel::get_field( $form, 1 );
// $date_type = $field->dateType;

// add_filter( 'gform_field_validation_3_8', function ( $result, $value, $form, $field ) {
//     if ( $result['is_valid'] ) {
//         if ( is_array( $value ) ) {
//             $value = array_values( $value );
//         }
//         $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
//         $originalDate = $date_value;
//         $newDate = date("d-m-Y", strtotime($originalDate));

//         $today = new DateTime();
//         $diff  = $today->diff( new DateTime( $newDate ) );
//         $age   = $diff->y;
  
//         if ( $age < 18 ) {
//             $result['is_valid'] = false;
//             $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
//         }
//     }

//     return $result;
// }, 10, 4 );

// /**
//  *  Todos pela Amazônia - Check if user is underage at Gravity Forms birthdate input
//  */
// $field = GFFormsModel::get_field( $form, 1 );
// $date_type = $field->dateType;

// add_filter( 'gform_field_validation_9_7', function ( $result, $value, $form, $field ) {
//     if ( $result['is_valid'] ) {
//         if ( is_array( $value ) ) {
//             $value = array_values( $value );
//         }
//         $date_value = GFFormsModel::prepare_date( $field->dateFormat, $value );
//         $originalDate = $date_value;
//         $newDate = date("d-m-Y", strtotime($originalDate));

//         $today = new DateTime();
//         $diff  = $today->diff( new DateTime( $newDate ) );
//         $age   = $diff->y;
  
//         if ( $age < 18 ) {
//             $result['is_valid'] = false;
//             $result['message']  = 'Desculpe, apenas maiores de 18 anos podem assinar.';
//         }
//     }

//     return $result;
// }, 10, 4 );


// /*
// * Setting the Phone Mask for Gravity Forms usage
// */

function gpbr_add_brazilian_phone_mask_gf( $phone_formats ) {
	$phone_formats['br'] = array(
		'label'       => 'Brasileiro com 9 dígitos e DDD',
		'mask'        => '99-99999-9999',
		'regex'       => '/^[1-9]{2}-9[0-9]{4}-[0-9]{4}$/',
	);
	return $phone_formats;
}

add_filter( 'gform_phone_formats', 'gpbr_add_brazilian_phone_mask_gf', 10, 2 );

/*
* Displaying URL parameter in a shortcode for front-end 
*/
function URLParam( $atts ) {  
    extract( shortcode_atts( array(
        'param' => 'param',
    ), $atts ) );
    return $_GET[$param];  
}
add_shortcode('URLParam', 'URLParam'); 
