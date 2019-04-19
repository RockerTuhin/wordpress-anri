<?php 

add_action('init','corporis_image_again_section');
if(!function_exists('corporis_image_again_section')):

function corporis_image_again_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_image_again'=>array(
					'name'=> esc_html__('Image Arrow Up','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
							'name' => 'image',
							'label'=> esc_html__('Image','corporis'),
							'type' => 'attach_image',  
							),
							
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_image_again($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'image'=>'',
	),$atts);
   extract($corporis_shortcode_atts);
   ?>
	<div class="Steps text-center">
	<div class="Step">
		<?php 
		$img_src = wp_get_attachment_image_src($image,'full');
		?> 
	    <div class="Step__thumb StepCurve StepCurve--up">
	        <img src="<?php echo esc_url($img_src[0]); ?>" alt="" height="100">
	    </div>
	</div>
</div>
<?php
return ob_get_clean();
}
add_shortcode('corporis_image_again','corporis_section_image_again');


?>