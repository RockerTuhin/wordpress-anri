<?php
function my_styles_method() {
	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . '/assets/css/custom_script.css'
	);
        $footer_copyright = cs_get_option('footer_copyright_color');
        $footer_p_tag_er_color = cs_get_option('footer_p_tag_er_color');
        $custom_css = "
                p.hlw{
                        color: {$footer_copyright};
                }
                p.plw{
                        color: {$footer_p_tag_er_color};
                }
                ";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
?>
<?php
     function corporis_blog_page_er_sidebar_select($col = 'main') 
     {
        $layout = cs_get_option('blog_column');

        $map = array(
               'main' => 'col-md-8 col-sm-8 u-PaddingLeft100 u-xs-PaddingLeft20',
               'sidebar' => 'col-md-4 col-sm-4',
        );
        switch ($layout) {
                case 'right':
                        $map['main'] = 'col-sm-8 col-sm-push-4 u-PaddingLeft100 u-xs-PaddingLeft20';
                        $map['sidebar'] = 'col-sm-4 col-sm-pull-8';
                        break;
                case 'center':
                        $map['main'] = 'col-md-8 col-md-offset-2';
                        $map['sidebar'] = '';
                        break;
                default:
                        # code...
                        break;
        }

        return array_key_exists( $col, $map ) ? $map[$col] : $map['main'];
     }
?>