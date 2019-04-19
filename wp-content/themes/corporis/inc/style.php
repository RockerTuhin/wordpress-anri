<?php
  class Corporis_styles {
  	public function __construct(){
  		add_action('wp_enqueue_scripts',array($this,'enqueue'));
  	}
  	public function enqueue(){
  		wp_enqueue_style('bootstrap',CORPORIS_VENDOR_URI.'bootstrap/css/bootstrap.min.css',array(),'3.3.6');
  		wp_enqueue_style('bootsnav',CORPORIS_VENDOR_URI.'bootsnav/css/bootsnav.css',array(),'1.0.0');
  		wp_enqueue_style('font-awesome',CORPORIS_VENDOR_URI.'font-awesome/css/font-awesome.min.css',array(),'1.0.0');
  		wp_enqueue_style('custom-icon',CORPORIS_VENDOR_URI.'custom-icon/css/style.css',array(),'1.0.0');
  		wp_enqueue_style('carousel',CORPORIS_VENDOR_URI.'owl.carousel2/owl.carousel.min.css',array(),'1.0.0');
  		wp_enqueue_style('magnific',CORPORIS_VENDOR_URI.'magnific-popup/magnific-popup.css',array(),'1.0.0');
  		wp_enqueue_style('animate',CORPORIS_VENDOR_URI.'animate.css/animate.min.css',array(),'1.0.0');
  		wp_enqueue_style('swiper',CORPORIS_VENDOR_URI.'swiper/css/swiper.min.css',array(),'1.0.0');
  		wp_enqueue_style('main',CORPORIS_ASSETS_URI.'css/main.min.css',array(),'1.0.0');
  		
  	}
  }
  new Corporis_styles;
?>