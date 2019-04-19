<?php 

add_action('init','corporis_budget_section');
if(!function_exists('corporis_budget_section')):

function corporis_budget_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_budget'=>array(
					'name'=> esc_html__('Budget','corporis'),
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
								'name'=>'amount',
								'label'=> esc_html__('Number','corporis'),
								'type'=> 'text',
							),
							
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_budget($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'title'=>'',
		  'number' => '',
		  'desc' => '',
		  'icon' => ''

	),$atts);
   extract($corporis_shortcode_atts);
   ?>

	<div class="Step">
        <div class="Step__thumb u-BoxShadow100">
            <span class="Step__thumb-number"><?php echo esc_html($number);?></span>
            <i class="Icon <?php echo esc_attr($icon);?>"></i>
        </div>
        <h3><?php echo esc_html($title);?></h3>
        <p class="u-MarginTop20"><?php echo esc_html($desc);?></p>
    </div>



<?php
return ob_get_clean();
}
add_shortcode('corporis_budget','corporis_section_budget');


?>