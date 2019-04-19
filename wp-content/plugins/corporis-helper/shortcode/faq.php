<?php
 
add_action('init', 'corporis_faq_section', 99 );
if(!function_exists('corporis_faq_section')):
function corporis_faq_section() {
 
	if (function_exists('kc_add_map')): 
	//{ 
	    kc_add_map(
	        array(

	           'corporis_faq' => array(

	'name' => esc_html__('FAQ', 'corporis'),
	'description' => __('', 'corporis'),
	'icon' => 'kc-icon-progress',
	'category' => 'Corporis',
	'css_box' => true,
	'params' => array(
		'content' => array(
		array(
			'type'			=> 'group',
			'label'			=> __('Options', 'KingComposer'),
			'name'			=> 'faq',
			'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'KingComposer' ),
			'options'		=> array('add_text' => __('Add new progress bar', 'kingcomposer')),
			'params' => array(
				array(
				'name' => 'title',
				'label' => esc_html__('Title','corporis'),
				'type' => 'text',
				),
				array(
				'name' => 'desc',
				'label' => esc_html__('Description','corporis'),
				'type' => 'textarea',
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
function corporis_section_faq($atts,$content){
	$corporis_shortcode_atts = shortcode_atts(array(
		'faq' => '',

	),$atts);
	extract($corporis_shortcode_atts);
	?>
    <!--faq start-->
    		<div class="col-md-6">
    			
                    <div class="panel-group u-PaddingRight20 u-sm-PaddingRight0" id="#accordion1">
                    	<?php 
	                    	$a = 1;
	                    	foreach($faq as $key => $item):
                    	?>
                        <div class="panel panel-default--">
                            <div class="panel-heading" id="<?php echo "heading".$a;?>">
                                <div class="panel-title ">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion1" href="<?php echo "#collapse".$a;?>" aria-expanded="true" aria-controls="<?php echo "collapse".$a;?>">
                                        <?php echo esc_html__($item->title);?>
                                    </a>
                                </div>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="<?php echo "heading".$a;?>">
                                <div class="panel-body">
                                    <?php echo esc_html__($item->desc);?>
                                </div>
                            </div>
                        </div>

                         <?php 
                         	$a = $a + 1;
	                     	endforeach;
	                     ?>
	                </div> 
            </div>

            
    <!--faq end-->
	<?php
}
add_shortcode('corporis_faq','corporis_section_faq');
?>