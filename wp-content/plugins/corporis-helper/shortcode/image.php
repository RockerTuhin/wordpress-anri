<?php 

add_action('init','corporis_image_section');
if(!function_exists('corporis_image_section')):

function corporis_image_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_image'=>array(
					'name'=> esc_html__('Image','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'image',
								'label'=> esc_html__('Image','corporis'),
								'type'=> 'attach_image',
							),
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_image($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'image'=>'',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
<!-- <div class="Steps text-center">
	<div class="Step">
		<?php 
		//$img_src = wp_get_attachment_image_src($image,'full');
		?> 
	    <!-- <div class="Step__thumb StepCurve StepCurve--down">
	        <img src="<?php e//cho esc_url($img_src[0]); ?>" alt="" height="100">
	    </div>
	</div>
</div> -->



<div class="Clients text-center">
	<?php 
		$img_src = wp_get_attachment_image_src($image,'full');
		?>
    <img src="<?php echo esc_url($img_src[0]); ?>" alt="..." height="100">
</div>


<?php
return ob_get_clean();
}
add_shortcode('corporis_image','corporis_section_image');


?>