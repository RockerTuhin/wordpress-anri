<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corporis
 */
$footer_column = cs_get_option('footer_widget_column');

$display_footer = false;
?>


<!--footer start-->
<!-- bg-darker -->

    <footer class="bg-darker u-PaddingTop55" style="background-color: <?php
                $bottom = cs_get_option('footer_background_color');
                echo $bottom;
            ?>">
        <div class="container text-sm">
            <div class="row">

            <?php for ($i = 1; $i <= $footer_column; $i++) { ?>

                <div class="col-md-<?php echo esc_attr(12/$footer_column); ?>">
                         <?php dynamic_sidebar("footer-{$i}") ?>   
                </div>
            <?php } ?>  

            </div>
        </div>
        <div class="text-center u-MarginTop30" style="background-color: <?php
                $bottom = cs_get_option('footer_bottom_portion_color');
                echo $bottom;
            ?>">
            <div class="footer-separator"></div>
            <p class="u-MarginBottom0 u-PaddingTop30 u-PaddingBottom30 small hlw">
            <!-- Copyright 2017 @ Corporis. All Rights Reserved. -->
            <?php
            $footer = '';
            if(function_exists('cs_get_option')){
            $footer = cs_get_option('footer_copyright');
            echo esc_html($footer);
            }
            ?>
        </p>
        </div>
    </footer>

    <!--footer end-->


    <!-- inject:js -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/jquery/jquery-1.12.0.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/bootsnav/js/bootsnav.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/jquery.countTo/jquery.countTo.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/owl.carousel2/owl.carousel.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/jquery.appear/jquery.appear.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/isotope/isotope.pkgd.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/imagesloaded/imagesloaded.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/jquery.countdown.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/swiper/js/swiper.min.js"></script> -->
    <!-- <script src="<?php //echo get_template_directory_uri();?>/assets/js/main.js"></script> -->
    <!-- endinject -->


<?php wp_footer(); ?>
</body>
</html>

