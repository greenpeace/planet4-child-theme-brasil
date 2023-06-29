<?php

/**
 * Client side dynamic population of form fields
 *
 * @param $form
 *
 * @return mixed
 */

 function gpbr_client_side_gravityforms_prefill( $form ) {
	$supported_field_types = [
		'GF_Field_Text',
		'GF_Field_Email',
		'GF_Field_Phone',
		'GF_Field_Hidden',
        'GF_Field_Checkbox',
	];


	$gf_fronted_populate = [];


	foreach ( $form['fields'] as $field ) {
		if ( $field->allowsPrepopulate && in_array( get_class( $field ), $supported_field_types ) ) {
			// The object doesn't contain the id attribute of the html field in the frontend.
			// Workaround: Render the field and grab the ID from the resulting HTML.
			$dom = new DOMDocument();
			$dom->loadHTML( $field->get_field_input( $form ) );


			$dom_field = $dom->getElementsByTagName( 'input' );


			$field_id = $dom_field[0]->getAttribute( 'id' );


			$gf_fronted_populate[] = [
				'parameter' => $field->inputName,
				'fieldId'   => $field_id,
				'fieldType' => get_class( $field ),
			];
		}
	}


	$gf_fronted_config['populate'] = $gf_fronted_populate;


	// Enqueue the script needed to populate fields
	wp_enqueue_script( 'gpbr-gf-client-side',
		get_stylesheet_directory_uri() . '/js/gravity-forms-client-side.js',
		array(),
		filemtime( get_stylesheet_directory() . '/js/gravity-forms-client-side.js' ),
		true );


	wp_localize_script( 'gpbr-gf-client-side', 'gpbrGfClientSideConfig', $gf_fronted_config );


	return $form;
}


add_filter( 'gform_pre_render', 'gpbr_client_side_gravityforms_prefill' );