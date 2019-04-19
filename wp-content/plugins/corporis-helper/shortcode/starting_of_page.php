<?php 

add_action('init','corporis_starting_of_page_section');
if(!function_exists('corporis_starting_of_page_section')):

function corporis_starting_of_page(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_starting_of_page'=>array(
					'name'=> esc_html__('Starting of page','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'background_image',
								'label'=> esc_html__('Image','corporis'),
								'type'=> 'attach_image',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Title','corporis'),
								'name' => 'title',
							),
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_starting_of_page($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'background_image'=>'',
		  'title'=>'',
	),$atts);
   extract($corporis_shortcode_atts);
   ?>

<section class="ImageBackground ImageBackground--overlay v-align-parent u-height450 js-Parallax" data-overlay="6" style="margin-top: 80px;">
	<?php
	$img_src = wp_get_attachment_image_src($background_image,'full'); 
	?>
        <div class="ImageBackground__holder" style="background-image: url(&quot;assets/imgs/bn-1.jpg&quot;); background-position: 50% 32px;">
            <img src="<?php echo esc_url($img_src[0]);?>" alt="...">
        </div>
        <div class="v-align-child">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-8 col-xs-12 text-white ">
                        <h1 class="u-Margin0 u-Weight700"><?php echo esc_html__($title);?></h1>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <ol class="breadcrumb text-white u-MarginTop10 u-MarginBottom0 pull-right">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span><?php echo esc_html__($title);?></span></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php
return ob_get_clean();
}
add_shortcode('corporis_starting_of_page','corporis_section_starting_of_page');


?>