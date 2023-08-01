<?php
/**
 * Meta Boxes for various data
 *
 * @package Carpress
 */

add_action( 'admin_init', 'custom_meta_boxes' );

function custom_meta_boxes() {
	// general
	$my_meta_box = array(
		'id'        => 'carpress_options',
		'title'     => _x( 'Carpress Options', 'backend', 'carpress_wp'),
		'desc'      => _x( 'Options specific to Carpress theme', 'backend', 'carpress_wp'),
		'pages'     => array( 'page', 'gallery' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
				'id'          => 'subtitle',
				'label'       => _x( 'Subtitle', 'backend', 'carpress_wp'),
				'desc'        => _x( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'backend', 'carpress_wp'),
				'std'         => '',
				'type'        => 'text',
				'class'       => '',
				'choices'     => array()
			),
			array(
				'id'          => 'title_bg',
				'label'       => _x( 'Background Image for Title Area', 'backend', 'carpress_wp'),
				'desc'        => _x( 'You can upload a custom image for the background of the title area for individual page.', 'backend', 'carpress_wp'),
				'std'         => '',
				'type'        => 'background',
				'class'       => '',
				'choices'     => array()
			),
			array(
				'id'          => 'revo_slider_alias',
				'label'       => __( 'Revolution Slider alias' , 'carpress_wp'),
				'desc'        => __( 'Only applies to the template "Front Page with Revolution Slider". Paste the alias of the slider you created in the Revolution Slider plugin to this box (only <a href="https://www.diigo.com/item/image/3rli1/s9bj?size=o" target="_blank">alias</a>, not the whole shortcode).' , 'carpress_wp'),
				'type'        => 'text',
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );



	// services
	$my_meta_box = array(
		'id'       => 'carpress_options',
		'title'    => _x( 'Carpress Options', 'backend', 'carpress_wp'),
		'desc'     => _x( 'Options specific to Carpress theme', 'backend', 'carpress_wp'),
		'pages'    => array( 'services' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'      => 'subtitle',
				'label'   => _x( 'Subtitle', 'backend', 'carpress_wp'),
				'desc'    => _x( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'backend', 'carpress_wp'),
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
				'choices' => array()
			),
			array(
				'id'      => 'show_front_page',
				'label'   => _x( 'Show on front page', 'backend', 'carpress_wp'),
				'desc'    => _x( 'Show this service on the front page?', 'backend', 'carpress_wp'),
				'std'     => '',
				'type'    => 'select',
				'class'   => '',
				'choices' => array(
					array(
						'value' => 'yes',
						'label' => _x( 'Yes', 'backend', 'carpress_wp'),
						'src'   => ''
					),
					array(
						'value' => 'no',
						'label' => _x( 'No', 'backend', 'carpress_wp'),
						'src'   => ''
					),
				)
			),
			array(
				'id'      => 'title_bg',
				'label'   => _x( 'Background Image for Title Area', 'backend', 'carpress_wp'),
				'desc'    => _x( 'You can upload a custom image for the background of the title area for individual page.', 'backend', 'carpress_wp'),
				'std'     => '',
				'type'    => 'background',
				'class'   => '',
				'choices' => array()
			),
			array(
				'id'      => 'link_for_widget',
				'label'   => _x( 'Optional link for the front page services widget', 'backend', 'carpress_wp'),
				'desc'    => _x( 'By default (if you leave this blank) each &quot;READ MORE&quot; link will link to the service. You can override this default behaviour by specifing your custom link in this field.', 'backend', 'carpress_wp'),
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );



	// testimonials
	$my_meta_box = array(
		'id'       => 'testimonial_options',
		'title'    => _x( 'Testimonial Options', 'backend', 'carpress_wp'),
		'desc'     => '',
		'pages'    => array( 'testimonials' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'      => 'author_title',
				'label'   => _x( 'Title of the author for this testimonial', 'backend', 'carpress_wp'),
				'desc'    => '',
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
				'choices' => array()
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );


	// team
	$my_meta_box = array(
		'id'       => 'team_options',
		'title'    => _x( 'Carpress Options', 'backend', 'carpress_wp'),
		'desc'     => _x( 'Options specific to Carpress theme', 'backend', 'carpress_wp'),
		'pages'    => array( 'team' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'subtitle',
				'label' => _x( 'Subtitle', 'backend', 'carpress_wp'),
				'desc'  => _x( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'backend', 'carpress_wp'),
				'std'   => '',
				'type'  => 'text',
			),
			array(
				'id'      => 'team_in_widget',
				'label'   => _x( 'Disply in the widget?', 'backend', 'carpress_wp'),
				'desc'    => _x( 'If you select here yes, this team member will be shown in the widget The Team', 'backend', 'carpress_wp'),
				'type'    => 'select',
				'std'     => 'yes',
				'choices' => array(
					array(
						'value' => 'yes',
						'label' => _x( 'Yes', 'backend', 'carpress_wp' ),
						'src'   => ''
					),
					array(
						'value' => 'no',
						'label' => _x( 'No', 'backend', 'carpress_wp' ),
						'src'   => ''
					),
				)
			),
			array(
				'id'    => 'team_custom_fields',
				'label' => _x( 'Team Member Custom Fields', 'backend', 'carpress_wp'),
				'desc'  => _x( 'You can here define properties of the team member such as Age, Style, Education etc.', 'backend', 'carpress_wp'),
				'type'  => 'list-item',
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );
}