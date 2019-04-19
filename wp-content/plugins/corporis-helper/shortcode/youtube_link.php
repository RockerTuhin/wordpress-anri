<?php 

add_action('init','corporis_youtube_link_section');
if(!function_exists('corporis_youtube_link_section')):

function corporis_youtube_link_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_youtube_link'=>array(
					'name'=> esc_html__('Youtube Link','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'background_image',
								'label'=> esc_html__('Background Image','corporis'),
								'type'=> 'attach_image',
							),
							array(
								'name' => 'title',
								'label' => esc_html__('Title','corporis'),
								'type' => 'text',
							),
							array(
								'name' => 'link',
								'label' => 'Enter Link',
								'type' => 'link',
								'value' => 'link|caption|target', 
							),
						)


					)
				)
		));

	endif;
}
endif;

function corporis_section_youtube_link($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'background_image'=>'',
		  'title' => '',
		  'link' => '',

	),$atts);
   extract($corporis_shortcode_atts);
   ?>
	 <section class="ImageBackground ImageBackground--overlay js-Parallax" data-overlay="6" style="position: inherit;">
		<!-- &quot;assets/imgs/parallax2.jpg&quot; -->
		<?php $img_src = wp_get_attachment_image_src($background_image,'full');?>
        <div class="ImageBackground__holder" style="background-image: url(&quot;<?php echo $img_src[0];?>&quot;); background-position: 50% 131px;">
            <img src="<?php echo $img_src[0];?>" alt="...">
        </div>
        <div class="container u-PaddingTop100 u-PaddingBottom100">
            <div class="row u-PaddingTop100 u-PaddingBottom100">
                <div class="col-md-12 text-center text-white">
                    <p class="u-MarginBottom40"><a class="btn btn-play u-Rounded u-MarginRight10 popup-youtube" href="<?php echo $link;?>"><i class="btn__iconCenter fa fa-play"></i></a></p>
                    <h1 class="u-MarginTop0 u-MarginBottom5 u-FontSize50 u-xs-FontSize36"><?php echo esc_html__($title);?>
                    	<?php //echo $link;?>
                    </h1>
                </div>
            </div>
        </div>
     </section>

<?php
return ob_get_clean();
}
add_shortcode('corporis_youtube_link','corporis_section_youtube_link');


?>