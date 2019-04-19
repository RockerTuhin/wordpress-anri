<?php 

add_action('init','corporis_numbering_first_section');
if(!function_exists('corporis_numbering_first_section')):

function corporis_numbering_first_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_numbering_first'=>array(
					'name'=> esc_html__('Numbering at First','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'number',
								'label'=> esc_html__('Number','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'title',
								'label'=> esc_html__('Title','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'desc',
								'label'=> esc_html__('Description','corporis'),
								'type'=> 'textarea',
							),
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

function corporis_section_numbering_first($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'number' => '',
		  'title'=>'',
		  'desc' => '',
		  'button_title' => '',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
<div class="u-PaddingTop100 u-PaddingBottom100 u-xs-MarginBottom30">
        <!-- <div class="container"> -->
            <!-- <div class="row">
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 "> -->
                    <div class="u-PaddingLeft40 u-md-Padding0 u-sm-PaddingLeft10 u-sm-PaddingRight10 u-xs-PaddingLeft20 u-xs-PaddingRight20">
                        <span class="u-Weight300 u-FontSize75 text-muted u-Opacity20"><?php echo esc_html__($number);?></span>
                        <h4 class="Blurb__hoverText u-MarginTop10 u-Weight700 text-uppercase"><?php echo esc_html__($title);?></h4>
                        <p class="u-LineHeight2"><?php echo esc_html__($desc);?></p>
                        <p class="u-MarginTop25">
                            <a class="btn-go" href="#" role="button"><?php echo esc_html__($button_title);?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </p>
                    </div>
              <!--   </div>
            </div> -->
        <!-- </div> -->
    </div>



<?php
return ob_get_clean();
}
add_shortcode('corporis_numbering_first','corporis_section_numbering_first');


?>