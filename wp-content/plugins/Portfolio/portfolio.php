<?php
	/*
	Plugin Name: Corporis Portfolio
   	Plugin URI: http://my-awesomeness-emporium.com
   	description: a plugin to create awesomeness and spread joy
   	Version: 1.2
   	Author: Mr. Tuhin
   	Author URI: http://mrtotallyawesome.com
   	License: GPL2
	*/
	


   // Register Custom Post Type Custom Post
// Post Type Key: custompost
function corporis_custom_post_type_portfolio() {

   $labels = array(
      'name' => __( 'Portfolios', 'Post Type General Name', 'corporis' ),
      'singular_name' => __( 'Portfolio', 'Post Type Singular Name', 'corporis' ),
      'menu_name' => __( 'Portfolios', 'corporis' ),
      'name_admin_bar' => __( 'Portfolio', 'corporis' ),
      'archives' => __( 'Portfolio Archives', 'corporis' ),
      'attributes' => __( 'Portfolio Attributes', 'corporis' ),
      'parent_item_colon' => __( 'Parent Portfolio:', 'corporis' ),
      'all_items' => __( 'All Portfolios', 'corporis' ),
      'add_new_item' => __( 'Add New Portfolio', 'corporis' ),
      'add_new' => __( 'Add New Portfolio', 'corporis' ),
      'new_item' => __( 'New Portfolio', 'corporis' ),
      'edit_item' => __( 'Edit Portfolio', 'corporis' ),
      'update_item' => __( 'Update Portfolio', 'corporis' ),
      'view_item' => __( 'View Portfolio', 'corporis' ),
      'view_items' => __( 'View Portfolios', 'corporis' ),
      'search_items' => __( 'Search Portfolio', 'corporis' ),
      'not_found' => __( 'Not found', 'corporis' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'corporis' ),
      'featured_image' => __( 'Featured Image', 'corporis' ),
      'set_featured_image' => __( 'Set featured image', 'corporis' ),
      'remove_featured_image' => __( 'Remove featured image', 'corporis' ),
      'use_featured_image' => __( 'Use as featured image', 'corporis' ),
      'insert_into_item' => __( 'Insert into Portfolio', 'corporis' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'corporis' ),
      'items_list' => __( 'Portfolios list', 'corporis' ),
      'items_list_navigation' => __( 'Portfolios list navigation', 'corporis' ),
      'filter_items_list' => __( 'Filter Portfolios list', 'corporis' ),
   );
   $args = array(
      'label' => __( 'Portfolio', 'corporis' ),
      'description' => __( 'Portfolio Description', 'corporis' ),
      'labels' => $labels,
      'menu_icon' => 'dashicons-screenoptions',
      'supports' => array('title','editor','thumbnail'),
      'taxonomies' => array('corporis_portfolio_category'),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => true,
      'hierarchical' => false,
      'exclude_from_search' => false,
      'show_in_rest' => true,
      'publicly_queryable' => true,
      'capability_type' => 'post',
   );
   register_post_type( 'corporis_portfolio', $args );

}
add_action( 'init', 'corporis_custom_post_type_portfolio', 0 );


function corporis_custom_taxonomy_portfolio() {

   $labels = array(
      'name' => __( 'Portfolio Categories', 'Post Type General Name', 'Taxonomy' ),
      'singular_name' => __( 'Portfolio Category', 'Post Type Singular Name', 'Taxonomy' ),
      'menu_name' => __( 'Portfolio Category', 'corporis' ),
      //'name_admin_bar' => __( 'Portfolio Category', 'corporis' ),
      //'archives' => __( 'Portfolio Category Archives', 'corporis' ),
      //'attributes' => __( 'Portfolio Category Attributes', 'corporis' ),
      'parent_item_colon' => __( 'Parent Item:', 'corporis' ),
      'parent_item' => __( 'Parent Item', 'corporis' ),
      'all_items' => __( 'All Portfolio Categories', 'corporis' ),
      'add_new_item' => __( 'Add New Portfolio Category', 'corporis' ),
      'add_new_item' => __( 'Add New Portfolio Category', 'corporis' ),
      'new_item_name' => __( 'New Portfolio Category', 'corporis' ),
      'edit_item' => __( 'Edit Portfolio Category', 'corporis' ),
      'update_item' => __( 'Update Portfolio Category', 'corporis' ),
      'view_item' => __( 'View Portfolio Category', 'corporis' ),
      //'view_items' => __( 'View Portfolios', 'corporis' ),
      'search_items' => __( 'Search Items', 'corporis' ),
      //'not_found' => __( 'Not found', 'corporis' ),
      //'not_found_in_trash' => __( 'Not found in Trash', 'corporis' ),
      //'featured_image' => __( 'Featured Image', 'corporis' ),
      //'set_featured_image' => __( 'Set featured image', 'corporis' ),
      //'remove_featured_image' => __( 'Remove featured image', 'corporis' ),
      //'use_featured_image' => __( 'Use as featured image', 'corporis' ),
      //'insert_into_item' => __( 'Insert into Portfolio Category', 'corporis' ),
      //'uploaded_to_this_item' => __( 'Uploaded to this Portfolio Category', 'corporis' ),
      'separate_items_with_commas' => __( 'Separate Items with Commas', 'corporis' ),
      'add_or_remove_items' => __( 'Add or Remove Items', 'corporis' ),
      'choose_from_most_used' => __( 'Choose From Most Used', 'corporis' ),
      'popular_items' => __( 'Popular Items', 'corporis' ),
      'not_found' => __( 'Not Found', 'corporis' ),
      'no_terms' => __( 'No items', 'corporis' ),
      'items_list' => __( 'Items list', 'corporis' ),
      'items_list_navigation' => __( 'Items list navigation', 'corporis' ),
      //'filter_items_list' => __( 'Filter Portfolios list', 'corporis' ),
   );
   $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'show_tagcloud' => true,
      //'can_export' => true,
      //'has_archive' => true,
      'hierarchical' => false,
      //'exclude_from_search' => false,
      //'show_in_rest' => true,
      //'publicly_queryable' => true,
   );
   register_taxonomy( 'corporis_portfolio_cat', array('corporis_portfolio'), $args );

}
add_action( 'init', 'corporis_custom_taxonomy_portfolio', 0 );

add_shortcode('portfolio','portfolio_function');
function portfolio_function()
{
   ?>
       <!--portfolio start-->
               <?php
                  $port = new Wp_Query(array(
                     'post_type' => 'corporis_portfolio',
                     'posts_per_page' => -1,
                  ));
                  if($port->have_posts()):
               ?>
                <div class="text-center">
                    <ul class="js-PortfolioFilter portfolio-filter text-center u-MarginTop0">
                        <li class="active"><a href="#" data-filter="*"> All</a></li>
                        <?php
                           $portfolio = get_terms('corporis_portfolio_cat',array('hide_empty' => true));
                          foreach ($portfolio as $item) {

                              echo '<li><a href="#" data-filter=".'.$item->slug.'">'.$item->name.'</a></li>';                             
                           }
                        ?>             
                    </ul>
                </div>
                  
                <div class="js-Portfolio portfolio-grid portfolio-gallery grid-4 gutter">
                     <?php
                      while($port->have_posts()):$port->the_post();
                          $slugs = get_the_terms(get_the_ID(),'corporis_portfolio_cat');
                          $slugs_in = array();
                          foreach ($slugs as $item) {
                              $slugs_in[] = $item->slug;
                          }
                          $slugs_category = join(' ',$slugs_in);
                      ?>
                    <div class="portfolio-item  <?php echo $slugs_category; ?>">
                        <a href="portfolio-details.html" class="portfolio-image" title="We are creative">
                            <?php the_post_thumbnail(); ?>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4><?php the_title(); ?></h4>
                                    <div class="portfolio-category">
                                        <span><?php echo $slugs_category; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                  <?php endwhile; ?>
                </div>
             <?php
               else:
                  echo "No Post found";
               endif;
             ?>  
    <!--portfolio end-->
   <?php
}
?>