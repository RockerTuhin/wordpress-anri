<?php 

add_action('init','corporis_buy_tickets_section');
if(!function_exists('corporis_buy_tickets_section')):

function corporis_buy_tickets_section(){
	if(function_exists('kc_add_map')):
		kc_add_map(array(
				'corporis_buy_tickets'=>array(
					'name'=> esc_html__('Buy Tickets','corporis'),
					'icon'=> 'fa fa-facebook',
					'category'=> 'Corporis',
					'params'=>array(
						'content'=>array(
							array(
								'name'=>'type',
								'label'=> esc_html__('Type','corporis'),
								'type'=> 'text',
							),
							array(
								'name'=>'amount',
								'label'=> esc_html__('Amount','corporis'),
								'type'=> 'text',
							),
		
						),//end content

						'style'=>array(
							array(
								'name' => 'my_css',
								'type' => 'css',
								'options' => array(
									array(
										'screens' => 'any,1024,767',
										'Background' => array(
											array(
												'property' => 'background-color',
												'label' => esc_html__('Background Color','corporis'),
												'selector' => '+ .hlw'
											)
										),//end Background
									)
								)//end options
							),
		
						)//end Style
					)
				)
		));

	endif;
}
endif;

function corporis_section_buy_tickets($atts,$content){
  ob_start();
	$corporis_shortcode_atts = shortcode_atts(array(
		  'type' => '',
		  'amount'=>'',
		  'my_css'=>'',
	),$atts);
   	extract($corporis_shortcode_atts);

   	$wrap_css = apply_filters('kc-el-class',$atts);
   	$wrap_css[] = $my_css;
   	$extra_css = implode(' ', $wrap_css);
   ?>
<div class="<?php echo $extra_css;?>">
	<div class="">
		<div class="u-Margin0">
			<div class="text-center u-Padding0">
			    <div class="u-BoxShadow100">
			        <div class="Blurb Blurb--wrapper hlw">
			            <h3 class="Blurb__hoverText u-MarginTop0"><?php echo esc_html__($type);?></h3>
			            <div class="Blurb__hoverText u-FontSize50 u-Weight700">
			                <small class="u-InlineBlock u-VerticalMiddle">$</small><?php echo esc_html__($amount);?>
			            </div>
			            <small class="Blurb__hoverText text-muted text-uppercase">Per month</small>
			            <p class="u-MarginTop35 u-MarginBottom35 u-LineHeight3">
			                - Entrance
			                <br>
			                - Free Lunch &amp; Snacks
			                <br>
			                - Custom Badge
			                <br>
			                - Certificate
			            </p>
			            <a class="Blurb__hoverBtn btn btn-default u-Rounded" href="#">Buy Tickets</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php
return ob_get_clean();
}
add_shortcode('corporis_buy_tickets','corporis_section_buy_tickets');


?>