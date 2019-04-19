<?php 

add_action('init','corporis_slider_section');
if(!function_exists('corporis_slider_section')):

function corporis_slider_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_slider'=>array(
					'name'=> esc_html__('Slider','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
	'type'			=> 'group',
	'label'			=> __('Options', 'kingcomposer'),
	'name'			=> 'slider',
	'description'	=> '',
	'options'		=> array('add_text' => __('Add new group', 'kingcomposer')),
	// you can use all param type to register child params
	'params' => array(
		array(
			'name' => 'background_image',
			'label' => esc_html__('Title','corporis'),

			'type' => 'attach_image',
		),
		array(
			'type' => 'text',
			'label' => esc_html__('Title','corporis'),
			'name' => 'title',
		),
		array(
			'type' => 'textarea',
			'label' => esc_html__('Description','corporis'),
			'name' => 'desc',
		),
		array(
			'type' => 'text',
			'label' => esc_html__('Button1 Title','corporis'),
			'name' => 'button1_title',
		),
		array(
			'type' => 'text',
			'label' => esc_html__('Button2 Title','corporis'),
			'name' => 'button2_title',
		),
	)
						),//end type:group

)
					)
				)
		));

	endif;
}
endif;

function corporis_section_slider($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'slider'=>'',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
   <!--slider start-->
    <div class="swiper-container js-FullHeight js-FullWeight" style="padding-right: 0;padding-left: 0;">
        <div class="swiper-wrapper">
        	<?php foreach($slider as $key => $item):?>
            <section class="swiper-slide ImageBackground ImageBackground--overlay" data-overlay="3" data-scheme="light" data-swiper-autoplay="200">
                <div class="ImageBackground__holder">
        <?php 
		$img_src = wp_get_attachment_image_src($item->background_image,'large');
		?>
                    <img src="<?php echo esc_url($img_src[0]);?>" alt="...">
                </div>
                <div class="container u-vCenter">
                    <div class="row ">
                        <div class="col-md-12 text-center text-white" data-animate="fadeInUp">
                            <h1 class="text-uppercase u-FontSize60 u-xs-FontSize40 u-MarginTop0 u-MarginBottom5 u-LetterSpacing2 u-Weight700"><?php echo esc_html__($item->title);?></h1>
                            <p class="text-lg  text-white u-MarginBottom15" ><?php echo esc_html__($item->desc);?></p>
                            <div class="u-MarginTop50 u-MarginBottom15">
                                <a href="#" class="btn btn-primary u-MarginRight10"><?php echo esc_html__($item->button1_title);?></a>
                                <a href="#" class="btn btn-white btn-white--transparent"><?php echo esc_html__($item->button2_title);?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; ?>  
        </div>
        <!-- Add Arrows -->
        <div class="swiper-control swiper-button-next"></div>
        <div class="swiper-control swiper-button-prev"></div>
    </div>
    <!--slider end-->


<?php
return ob_get_clean();
}
add_shortcode('corporis_slider','corporis_section_slider');


?>