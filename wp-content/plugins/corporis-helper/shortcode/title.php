<?php
 
add_action('init', 'corporis_title_section', 99 );
 
function corporis_title_section() {
 
	if (function_exists('kc_add_map')) 
	{ 
	    kc_add_map(
	        array(

	            'corporis_title' => array(
	                'name' => esc_html__('Title','corporis'),
	                'description' => __('Display single icon', 'KingComposer'),
	                'icon' => 'fa fa-facebook',
	                'category' => 'Corporis',
	                'params' => array(
	                	'content' => array(
	                    array(
	                        'name' => 'title',
	                        'label' => esc_html__('Title','corporis'),
	                        'type' => 'text',
	                    ),
	                    array(
	                        'name' => 'desc',
	                        'label' => esc_html__('Description','corporis'),
	                        'type' => 'textarea',
	                    ),
						array(
						'name' => 'alignment',
						'label' => esc_html__('Select Alignment','corporis'),

						'type' => 'select',  // USAGE SELECT TYPE
						'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
							'text-left' => 'Alignment Left',
							'text-center' => 'Alignment Center',
							'text-right' => 'Alignment Right',
						)
						),
						array(
	                        'name' => 'custom_class',
	                        'label' => esc_html__('Extra Class','corporis'),
	                        'type' => 'text',
	                    ),
					),//end content tab
	                	'style' => array(
	                		array(
	                			'name' => 'custom_css',
	                			'type' => 'css',
	                			'options' => array(
	                				array(
	                					'screens' => 'any,1024,767',
	                					'Title' => array(
	                						array(
	                							'property' => 'color',
	                							'label' => 'Title Color',
	                							'selector' => '+ .title_to'
	                						),
	                						array(
	                							'property' => 'font-size',
	                							'label' => 'Title Font size',
	                							'selector' => '+ .title_to'
	                						),
	                					),//end title
	                					'Description' => array(
	                					 	array(
	                					 		'property' => 'color',
	                					 		'label' => 'Description Color',
	                					 		'selector' => '+ .desc'
	                					 	),
	                					
	                					),//end Description
	                					'Background' => array(
	                						array(
	                					 	 	'property' => 'background-color',
	                					 	 	'label' => 'Background Color',
	                					 	 	'selector' => '+ .hlw'
	                					 	 ),
	                					),//end Background
	                				)
	                			)//end option
	                		)
	                	),//end style tab
	                )
	            ),  // End of elemnt kc_icon 

	        )
	    ); // End add map
	
	} // End if

}  
function corporis_section_title($atts,$content){
	$corporis_shortcode_atts = shortcode_atts(array(
		'title' => '',
		'desc' => '',
		'alignment' => '',
		'custom_class' => '',
		'custom_css' => '',
	),$atts);
	extract($corporis_shortcode_atts);
	 $wrap_class = apply_filters('kc-el-class',$atts);
	 $wrap_class[] = $custom_css;
	 $extra_class = implode(' ', $wrap_class);
	?>
<div class="<?php echo  $custom_class;?> <?php echo  $extra_class;?> ">
	<div class="hlw">
	
		<div class="<?php echo esc_attr($alignment);?> ">
            <h1 class="u-MarginTop0 u-MarginBottom10 u-Weight700 title_to"> <?php
            echo esc_html__($title);?></h1>
            <div class="Split"></div>
            <p class="u-MarginTop35 desc"><?php
            echo esc_html__($desc);?></p>
        </div>
     </div>
 </div>
	<?php
}
add_shortcode('corporis_title','corporis_section_title');
?>