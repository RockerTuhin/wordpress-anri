<?php
function corporis_metabox ($options) {
	$options        = array();

	$options[]      = array(
	  'id'            => 'section_first',
	  'title'         => 'Custom Options',
	  'post_type'     => 'page', // or post or CPT or array( 'page', 'post' )
	  'context'       => 'normal',
	  'priority'      => 'default',
	  'sections'      => array(

	    // begin section
	    array(
	      'name'      => 'title_section',
	      'title'     => 'Title Section',
	      'icon'      => 'fa fa-wifi',
	      'fields'    => array(

	        // a field
	      	array(
			  'id'      => 'enableordisable',
			  'type'    => 'radio',
			  'title'   => 'Radio Field',
			  'options' => array(
			    'yes'   => 'Enable',
			    'no'    => 'Disable',
			  ),
			  'default' => 'no',
			),
			array(
			  'id'        => 'title_background_image',
			  'type'      => 'image',
			  'title'     => 'Title Background Image',
			  'add_title' => 'Add Image',
			  'dependency'   => array( 'enableordisable_yes', '!=', '' ),
			),
			array(
			  'id'      => 'title_background_color',
			  'type'    => 'color_picker',
			  'title'   => 'Title Background Color',
			  'default' => '#ffbc00',
			  'dependency'   => array( 'enableordisable_yes', '!=', '' ),
			),
	      ),
	    ),
	  ),
	);
	return $options;
}
add_filter('cs_metabox_options','corporis_metabox')
?>