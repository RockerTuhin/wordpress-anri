<?php
  class Corporis_script {
    public function __construct(){
      add_action('wp_enqueue_scripts',array($this,'enqueue'));
    }
    public function enqueue() {
      wp_enqueue_script('bootstrap',CORPORIS_VENDOR_URI.'bootstrap/js/bootstrap.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('bootsnav',CORPORIS_VENDOR_URI.'bootsnav/js/bootsnav.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('countTo',CORPORIS_VENDOR_URI.'jquery.countTo/jquery.countTo.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('carousel',CORPORIS_VENDOR_URI.'owl.carousel2/owl.carousel.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('appear',CORPORIS_VENDOR_URI.'jquery.appear/jquery.appear.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('isotope',CORPORIS_VENDOR_URI.'isotope/isotope.pkgd.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('image',CORPORIS_VENDOR_URI.'imagesloaded/imagesloaded.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('popup',CORPORIS_VENDOR_URI.'magnific-popup/jquery.magnific-popup.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('countdown',CORPORIS_VENDOR_URI.'jquery.countdown.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('swiper',CORPORIS_VENDOR_URI.'swiper/js/swiper.min.js',array('jquery'),'1.0.0',true);
      wp_enqueue_script('main',CORPORIS_ASSETS_URI.'js/main.js',array('jquery'),'1.0.0',true);
    }
  }
  new Corporis_script;
?>