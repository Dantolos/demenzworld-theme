<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_66ea8897d63ca',
	'title' => 'Settings | Navigation',
	'fields' => array(
		array(
			'key' => 'field_66ea88984ed95',
			'label' => 'Navigation',
			'name' => 'navigation',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_66ea88b84ed96',
					'label' => 'Title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '40',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'allow_in_bindings' => 0,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_66ea88984ed95',
				),
				array(
					'key' => 'field_66ea88c74ed97',
					'label' => 'Link',
					'name' => 'link',
					'aria-label' => '',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '40',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'allow_in_bindings' => 0,
					'parent_repeater' => 'field_66ea88984ed95',
				),
				array(
					'key' => 'field_66ea88e24ed98',
					'label' => 'Color',
					'name' => 'color',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#170056',
					'enable_opacity' => 0,
					'return_format' => 'string',
					'allow_in_bindings' => 0,
					'parent_repeater' => 'field_66ea88984ed95',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'general',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

