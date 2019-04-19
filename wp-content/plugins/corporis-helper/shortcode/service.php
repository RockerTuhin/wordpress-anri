<?php
 
add_action('init', 'corporis_service_section');
if(!function_exists('corporis_service_section')):
function corporis_service_section() {
 
	if (function_exists('kc_add_map')): 
	//{ 
	    kc_add_map(
	        array(

	            'corporis_service' => array(
	                'name' => esc_html__('Service','corporis'),
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
	                        'name' => 'content',
	                        'label' => esc_html__('Description','corporis'),
	                        'type' => 'textarea',
	                    ),

	                    array(
	                        'name' => 'icon',
	                        'label' => esc_html__('Icon','corporis'),
	                        'type' => 'icon_picker',
	                    ),
	                    )
	                )
	            )  // End of elemnt kc_icon 

	        )
	    );
	endif;
}  
endif;



	function corporis_section_service($atts,$content){
		ob_start();
		$corporis_shortcode_atts = shortcode_atts(array(
			'title' => '',
			'icon' => '',
			'content' => '',
		),$atts);
		extract($corporis_shortcode_atts);
		?>
			<div class="u-xs-MarginBottom30">
                    <div class="Blurb u-PaddingLeft15 u-PaddingRight15">
                        <div class="media u-OverflowVisible">
                            <div class="media-left media-middle--">
                                <div class="Thumb">
                                    <i class="Blurb__hoverText Icon <?php echo esc_attr($icon);?> Icon--32px" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="Blurb__hoverText text-uppercase u-MarginTop5"><?php echo esc_html($title);?></h4>
                                <p class="u-LineHeight2"><?php echo esc_html($content);?></p>
                            </div>
                        </div>
                   </div>
            </div>
		<?php
		return ob_get_clean();
	}
	add_shortcode('corporis_service','corporis_section_service');
?>