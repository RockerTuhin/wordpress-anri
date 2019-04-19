<?php 

add_action('init','corporis_celebrity_people_first_section');
if(!function_exists('corporis_celebrity_people_first_section')):

function corporis_celebrity_people_first_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_celebrity_people_first'=>array(
					'name'=> esc_html__('Celebrity People','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'image',
								'label'=> esc_html__('Choose image','corporis'),
								'type'=> 'attach_image',
							),
							array(
								'name'=>'name',
								'label'=> esc_html__('Enter name','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'post',
								'label'=> esc_html__('Enter Post','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'icon1',
								'label'=> esc_html__('Choose Icon 1','corporis'),
								'type'=> 'icon_picker',
							),
							array(
							'name' => 'link1',
							'label' => 'Enter Link 1',
							'type' => 'link',
							),
							array(
								'name'=>'icon2',
								'label'=> esc_html__('Choose Icon 2','corporis'),
								'type'=> 'icon_picker',
							),
							array(
							'name' => 'link2',
							'label' => 'Enter Link 2',
							'type' => 'link',
							),
							array(
								'name'=>'icon3',
								'label'=> esc_html__('Choose Icon 3','corporis'),
								'type'=> 'icon_picker',
							),
							array(
							'name' => 'link3',
							'label' => 'Enter Link 3',
							'type' => 'link',
							),
							
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_celebrity_people_first($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'image' => '',
		  'name'=>'',
		  'post' => '',
		  'icon1' => '',
		  'link1' => '',
		  'icon2' => '',
		  'link2' => '',
		  'icon3' => '',
		  'link3' => '',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
   	<div class="u-BoxShadow100">
        <div class="Blurb Blurb--wrapper20">
        	<?php
        		$img_src = wp_get_attachment_image_src($image,'full');
        	?>
            <img class="img-responsive" src="<?php echo esc_url($img_src[0]); ?>" alt="...">
            <h4 class="u-MarginTop25 u-MarginBottom0"><?php echo esc_html__($name); ?></h4>
            <p class="text-muted"><?php echo esc_html__($post); ?></p>
            <p class="u-MarginTop20 Anchors">
                <a class="text-muted" href="<?php echo esc_url($link1); ?>"><i class="fa <?php echo esc_attr($icon1); ?>" aria-hidden="true"></i></a>

                <a class="text-muted" href="<?php echo esc_url($link2); ?>"><i class="fa <?php echo esc_attr($icon2); ?>" aria-hidden="true"></i></a>

                <a class="text-muted" href="<?php echo esc_url($link3); ?>"><i class="fa <?php echo esc_attr($icon3); ?>" aria-hidden="true"></i></a>
            </p>
        </div>
    </div>
<?php
return ob_get_clean();
}
add_shortcode('corporis_celebrity_people_first','corporis_section_celebrity_people_first');


?>