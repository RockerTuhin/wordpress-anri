<?php
function metabox_first_section() {
	$meta_data = get_post_meta( get_the_ID(), 'section_first', true );
	$enableordisable = isset($meta_data['enableordisable']) ? $meta_data['enableordisable'] : array();
	$title_background_image = isset($meta_data['title_background_image']) ? $meta_data['title_background_image'] : array();
	$title_background_color = isset($meta_data['title_background_color']) ? $meta_data['title_background_color'] : array();

	if($enableordisable == 'yes'):
?>
	<section class="ImageBackground ImageBackground--overlay v-align-parent u-height450 js-Parallax" data-overlay="6" style="background-color: <?php echo $title_background_color; ?>">
		<?php if(!empty($title_background_image)):?>
	        <div class="ImageBackground__holder">
	        	<?php 
	        		$img = wp_get_attachment_image_url($title_background_image,'full');
	        	?>
	        	<img src="<?php echo $img;?>" alt="...">
	    	</div>
	    <?php endif; ?>
	    <div class="v-align-child">
	        <div class="container ">
	            <div class="row ">
	                <div class="col-md-8 col-xs-12 text-white ">
	                    <h1 class="u-Margin0 u-Weight700"><?php single_post_title(); ?></h1>
	                </div>

	                <div class="col-md-4 col-xs-12">
	                    <ol class="breadcrumb text-white u-MarginTop10 u-MarginBottom0 pull-right">
	                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
	                        <li class="active"><span><?php single_post_title(); ?></span></li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	</section>
<?php endif;
}
