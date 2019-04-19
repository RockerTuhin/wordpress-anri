<?php
define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

// framework options filter example
function extra_cs_framework_options( $options ) {

  $options      = array(); // remove old options

  $options[]    = array(
    'name'      => 'header_section_id',
    'title'     => esc_html__('Header Section','corporis'),
    'icon'      => 'fa fa-heart',
    'fields'    => array(
      array(
        'id'    => 'option_id',
        'type'  => 'text',
        'title' => esc_html__('First Option','corporis'),
      ),
      array(
        'id'    => 'another_option_id',
        'type'  => 'textarea',
        'title' => esc_html__('Secondary Option','corporis'),
      ),
      array(
        'id'    => 'header_color',
        'type'  => 'color_picker',
        'title' => esc_html__('Header Title Color','corporis'),
      ),
      array(
        'id'    => 'header_background_color',
        'type'  => 'color_picker',
        'title' => esc_html__('Header Background Color','corporis'),
      ),
    )
  );

  $options[] =array(
    'name' => 'footer_section_id',
    'title' => esc_html__('Footer Section','corporis'),
    'icon'      => 'fa fa-heart',
    'fields' => array(
      array(
        'id' => 'footer_copyright',
        'type' => 'text',
        'title' => esc_html__('Footer Copyright','corporis')
      ),
      array(
        'id' => 'footer_copyright_color',
        'type' => 'color_picker',
        'title' => esc_html__('Footer Copyright Color','corporis')
      ),
      array(
        'id' => 'footer_background_color',
        'type' => 'color_picker',
        'title' => esc_html__('Footer Background Color','corporis')
      ),
      array(
        'id' => 'footer_bottom_portion_color',
        'type' => 'color_picker',
        'title' => esc_html__('Footer Bottom Portion Color','corporis')
      ),
      array(
        'id' => 'footer_p_tag_er_color',
        'type' => 'color_picker',
        'title' => esc_html__('Footer P tag er Color','corporis')
      ),
      array(
        'id'       => 'footer_widget_column',
        'type'     => 'select',
        'title'    => esc_html__('Footer Column','corporis'),
        'options'  => array(
          '1'  => esc_html__('Column 1','corporis'),
          '2'   => esc_html__('Column 2','corporis'),
          '3' => esc_html__('Column 3','corporis'),
          '4' => esc_html__('Column 4','corporis'),
        ),
        'default'  => '4',
      ),
    )
  );

    $options[] =array(
    'name' => 'blog_section_id',
    'title' => esc_html__('Blog Page Section','corporis'),
    'icon'      => 'fa fa-heart',
    'fields' => array(
     
      array(
        'id'       => 'blog_column',
        'type'     => 'select',
        'title'    => esc_html__('Blog Column','corporis'),
        'options'  => array(
          'left'  => esc_html__('Left Sidebar','corporis'),
          'right'   => esc_html__('Right Sidebar','corporis'),
          'center' => esc_html__('Center','corporis'),
        ),

      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'extra_cs_framework_options' );
?>