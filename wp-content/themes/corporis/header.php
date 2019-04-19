<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corporis
 */

?>
<!DOCTYPE html>
<html class="html" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri();?>/assets/imgs/favicon.png" />

    <title>Home</title>

    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
    <!-- inject:css -->
   <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/bootsnav/css/bootsnav.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/font-awesome/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/custom-icon/css/style.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/owl.carousel2/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/magnific-popup/magnific-popup.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/animate.css/animate.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/vendor/swiper/css/swiper.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/css/main.min.css"> -->
    <!-- endinject -->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!--header start-->
    <header>
        <!-- Start Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed white bootsnav" style="background-color: 
                <?php
                    $header_backgound = cs_get_option('header_background_color');
                    echo $header_backgound;
                ?>">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="./index.html">
                        <?php
                        $banner_pre = '';
                        if(function_exists('cs_get_option')){
                          $banner_pre = cs_get_option('option_id');
                        }
                        $header_col = cs_get_option('header_color');
                        ?>
                        <h3 class="u-Weight700 u-MarginTop10 u-MarginBottom0 u-sm-MarginTop0" style="color:<?php echo $header_col;?>">
                            <!--<img src="assets/imgs/logo.png" class="logo logo-scrolled" alt="">-->
                            <!--  Corporis  -->
                            <?php
                              echo  esc_html($banner_pre);
                            ?>
                        </h3>
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?php corporis_nav_menu(); ?>
                    <!-- <ul class="nav navbar-nav navbar-right" data-in="" data-out="">
                        <li>
                            <a href="index.html" >Home</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pages</a>
                            <ul class="dropdown-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="our-services.html">Services</a></li>
                                <li><a href="pricing-table.html">Pricing Table</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="portfolio.html" >Portfolio</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Centered</a></li>
                                <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                                <li><a href="blog-details-centered.html">Blog Details Centered</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact-us.html" >Contact Us</a>
                        </li>
                    </ul> -->
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
        <div class="clearfix"></div>
    </header>
    <!--header end-->
