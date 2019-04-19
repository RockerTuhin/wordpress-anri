<?php 

add_action('init','corporis_uptofooter_section');
if(!function_exists('corporis_uptofooter_section')):

function corporis_uptofooter_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_uptofooter'=>array(
					'name'=> esc_html__('Uptofooter','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'title',
								'label'=> esc_html__('Title','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'number',
								'label'=> esc_html__('Number','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'desc',
								'label'=> esc_html__('Description','corporis'),
								'type'=> 'textarea',
							),
							array(
							'name' => 'choose',
							'label' => esc_html__('Choose One','corporis'),

							'type' => 'select',  // USAGE SELECT TYPE
							'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
								'icon' => 'Icon',
								'image' => 'Image',
							)
						),
							array(
								'name'=>'icon',
								'label'=> esc_html__('Icon','corporis'),
								'type'=> 'icon_picker',
								'relation' => array(
								        'parent'    => 'choose',
								        'show_when' => 'icon'
								    )
							),
							array(
							'name' => 'image',
							'label' => 'Image',

							'type' => 'attach_image',  // USAGE ATTACH_IMAGE TYPE
							'relation' => array(
								        'parent'    => 'choose',
								        'show_when' => 'image'
								    )
						),
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_uptofooter($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'title'=>'',
		  'number' => '',
		  'desc' => '',
		  'icon' => '',
		  'choose' => '',
		  'image' => '',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
    <div class="Steps text-center">
	<div class="Step">
        <div class="Step__thumb u-BoxShadow100">
            <span class="Step__thumb-number"><?php echo esc_html__($number);?></span>
             <?php if ($choose == 'icon') { ?> 

            <i class="Icon <?php echo esc_attr($icon);?>"></i>
            <?php } ?>
            <?php
            $img_src = wp_get_attachment_image_src($image,'small');
            ?>
            <?php if ($choose == 'image') { ?>
            <img class="Step__thumb-img" src="<?php echo $img_src[0];?>">
            <?php } ?>
        </div>
        <h3><?php echo esc_html__($title);?></h3>
        <p class="u-MarginTop20"><?php echo esc_html__($desc);?></p>
    </div>
 </div>


<?php
return ob_get_clean();
}
add_shortcode('corporis_uptofooter','corporis_section_uptofooter');


?>