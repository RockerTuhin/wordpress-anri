<?php
	/*
	Plugin Name: Custom Post Type
   	Plugin URI: http://my-awesomeness-emporium.com
   	description: a plugin to create awesomeness and spread joy
   	Version: 1.2
   	Author: Mr. Tuhin
   	Author URI: http://mrtotallyawesome.com
   	License: GPL2
	*/
	

add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Book', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','thumbnail',)
	);

	register_post_type( 'book', $args );
}


function wpdocs_register_meta_boxes() {
    add_meta_box( 'books-id', __( 'Name', 'textdomain' ), 'wpdocs_my_display_callback', 'book','side','high');
    add_meta_box( 'author-id', __( 'Choose Author', 'textdomain' ), 'wpdocs_my_display_callback_author', 'book','side','high');
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

function wpdocs_my_display_callback($post)
{
	$name = get_post_meta($post->ID,'books_name',true);
	$email = get_post_meta($post->ID,'books_email',true);
	?>
		<label>Name:</label>
		<input type="text" name="name" value="<?php echo  $name; ?>"><br>
		<label>Email:</label>
		<input type="email" name="email" value="<?php echo  $email; ?>">
	<?php
}

add_action('save_post','data_save',10,2);
function data_save($post_id,$post)
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	update_post_meta($post_id,'books_name',$name);
	update_post_meta($post_id,'books_email',$email);
}

add_action('manage_book_posts_columns','custom_column');
function custom_column($column)
{
	$column = array(
		'cb' => "<input type='checkbox'>",
		'title' => 'Books Title',
		'name' => 'Name',
		'email' => 'Email',
		'date' => 'Date',
	);
	return $column;
}

add_action('manage_book_posts_custom_column','show_custom_column',10,2);
function show_custom_column($column,$post_id)
{
	switch ($column) {
		case 'name':
			$name = get_post_meta($post_id,'books_name',true);
			echo $name;
			break;
		case 'email':
			$email = get_post_meta($post_id,'books_email',true);
			echo $email;
			break;
		default:
			# code...
			break;
	}
}

add_filter('manage_edit-book_sortable_columns','enable_sorting');
function enable_sorting($column)
{
	$column['name'] = 'name';
	$column['email'] = 'email';
	return $column;
}

function wpdocs_my_display_callback_author($post)
{
	$author = get_users(array('role' => 'author'));
	$author_select = get_post_meta($post->ID,'author_select',true);
	?>
	<select name="author">
		<?php foreach ($author as $item): ?>
			<?php
				$select = '';
				if($author_select == $item->ID)
				{
					$select = 'selected = "selected"';
				}
			?>
			<option value="<?php echo $item->ID; ?>"  <?php echo $select; ?>><?php echo $item->display_name; ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

add_action('save_post','author_data_save',10,2);
function author_data_save($post_id,$post)
{
	$author = $_POST['author'];
	update_post_meta($post_id,'author_select',$author);
}

add_action('restrict_manage_posts','author_filter');
function author_filter()
{
	global $typenow;
	if($typenow == 'book')
	{
		$author_id = $_GET['Author_Filter'];
		// echo $typenow;
		wp_dropdown_users(array(
			'role' => 'author',
			'show_option_none' => 'Select Author',
			'name' => 'Author_Filter', // string
            'id' => 'all_author_filter', // integer
            'selected' => $author_id,
		));
	}
}

add_filter('parse_query','filter_by_author');
function filter_by_author($query)
{
	global $typenow;
	global $pagenow;
	$author_id = $_GET['Author_Filter'];
	if($typenow == 'book' && $pagenow == 'edit.php' && !empty($author_id))
	{
		$query->query_vars["meta_key"] = 'author_select';
		$query->query_vars["meta_value"] = $author_id;
	}
}


add_action( 'init', 'create_book_tax' );
function create_book_tax() {
	register_taxonomy(
		'book_category',
		'book',
		array(
			'label' => __( 'Book Category' ),
			'rewrite' => array( 'slug' => 'book_category' ),
			'hierarchical' => true,
		)
	);
}

add_action('restrict_manage_posts','category_filter');
function category_filter()
{
	global $typenow;
	$taxonomy = 'book_category';
	$select = $_GET[$taxonomy];
	if($typenow == 'book')
	{
		wp_dropdown_categories( array(
			'show_option_all' => 'Show All',
			'taxonomy' => $taxonomy,
			'show_count' => true,
			'name' => $taxonomy,
			'selected' => $select,
		) );
	}
}

add_filter('parse_query','filter_by_category');
function filter_by_category($query)
{
	global $typenow;
	global $pagenow;
	$taxonomy = 'book_category';
	$query_var = &$query->query_vars;
	// print_r($query_var);
	if($typenow == 'book' && $pagenow == 'edit.php' && isset($query_var[$taxonomy]) && is_numeric($query_var[$taxonomy]))
	{
		$term_details = get_term_by("id",$query_var[$taxonomy],$taxonomy);
		//print_r($query_var);
		$query_var[$taxonomy] = $term_details->slug;
	}
}

?>