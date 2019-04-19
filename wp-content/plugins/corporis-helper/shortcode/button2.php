<?php 

add_action('init','corporis_button2_section');
if(!function_exists('corporis_button2_section')):

function corporis_button2_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_button2'=>array(
					'name'=> esc_html__('Button 2','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'button_title',
								'label'=> esc_html__('Button Title','corporis'),
								'type'=> 'text',
							),
							
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_button2($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'button_title' => '',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
<!-- a href="#" class="btn btn-md btn-default u-Rounded" align="center"><?php //echo esc_html__($button_title);?><div></div></a> -->
<a href="#" class="btn btn-md btn-primary"><?php echo esc_html__($button_title);?></a>

<!-- <div class="u-MarginTop50 Shortcode-button">
                    <a href="#" class="btn btn-md btn-default u-Rounded">Project Manager<div></div></a>
                    <a href="#" class="btn btn-md btn-default u-Rounded">Web Designer</a>
                    <a href="#" class="btn btn-md btn-default u-Rounded">Office Assistance</a>
</div> -->

<?php
return ob_get_clean();
}
add_shortcode('corporis_button2','corporis_section_button2');


?>