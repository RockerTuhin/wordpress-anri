<?php
 
add_action('init', 'corporis_testimonial_section', 99 );
if(!function_exists('corporis_testimonial_section')):
function corporis_testimonial_section() {
 
	if (function_exists('kc_add_map')): 
	//{ 
	    kc_add_map(
	        array(

	           'corporis_testimonial' => array(

	'name' => esc_html__('Testimonial', 'corporis'),
	'description' => __('', 'corporis'),
	'icon' => 'kc-icon-progress',
	'category' => 'Corporis',
	'css_box' => true,
	'params' => array(
		'content' => array(
		array(
			'type'			=> 'group',
			'label'			=> __('Options', 'KingComposer'),
			'name'			=> 'testimonial',
			'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'KingComposer' ),
			'options'		=> array('add_text' => __('Add new progress bar', 'kingcomposer')),
			'params' => array(
				array(
				'name' => 'image',
				'label' => esc_html__('Set Image','corporis'),
				'type' => 'attach_image',  // USAGE ATTACH_IMAGE TYPE
				'admin_label' => true,
				'description' => 'Field Description',
				),
				array(
				'name' => 'desc',
				'label' => esc_html__('Description','corporis'),
				'type' => 'textarea',  // USAGE ATTACH_IMAGE TYPE
				'admin_label' => true,
				),
				array(
				'name' => 'name',
				'label' => esc_html__('Name','corporis'),
				'type' => 'text',  // USAGE ATTACH_IMAGE TYPE
				'admin_label' => true,
				),
				array(
				'name' => 'position',
				'label' => esc_html__('Position','corporis'),
				'type' => 'text',  // USAGE ATTACH_IMAGE TYPE
				'admin_label' => true,
				),

	))
	)//end content tab
)
)  // End of elemnt kc_icon 

	        )
	    ); // End add map
	
	//} // End if
	endif;
}
endif;  
function corporis_section_testimonial($atts,$content){
	$corporis_shortcode_atts = shortcode_atts(array(
		'testimonial' => '',

	),$atts);
	extract($corporis_shortcode_atts);
	?>
	<div class="col-md-12">
	   <div class="js-OwlCarousel owl-carousel owl-theme OwlDots">
	   	<?php foreach($testimonial as $key => $item):?>
            <div class="owl-carousel-item">
                <div class="Thumb Thumb--62px Thumb--image Thumb--rounded">
                	<?php
                	$img_src = wp_get_attachment_image_src($item->image,'full');
                	?>
                    <img class="img-responsive" src="<?php echo esc_url($img_src[0]);?>" alt="...">
                </div>
                <p class="text-italic u-MarginTop30"><?php echo $item->desc;?></p>
                <h5 class="text-primary text-uppercase u-MarginTop30 u-MarginBottom5 u-Weight700">- <?php echo $item->name;?> -</h5>
                <p class="small"><?php echo $item->position?></p>
            </div> 
            <?php endforeach;?>      
        </div>
        </div>
	<?php
}
add_shortcode('corporis_testimonial','corporis_section_testimonial');
?>