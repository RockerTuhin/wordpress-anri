<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Anri
 */

?>

<footer class="page-footer">
      <div class="container  page-footer__top">
       <!--  <div class="col-sm-5  col-md-5">
          <div class="page-footer__top-about">
            <h4>Daniel Anri.</h4>
            <p>Suspendisse lobortis commodo ullamcorper. Duis pretium convallis odio non varius.</p>
            <p>Phone: +123.456.789</p>
            <p>Email: <a href="mailto:mail@danielanri.com">mail@danielanri.com</a></p>
          </div>
        </div> -->

        <?php dynamic_sidebar('footer-widget-1')?>

        <!-- <div class="col-sm-3  col-md-3">
          <h4>Categories</h4>
          <nav class="page-footer__nav">
            <ul class="page-footer__nav-items">
              <li class="page-footer__nav-item">
                <a href="category.html">Lifestyle</a>
              </li>
              <li class="page-footer__nav-item">
                <a href="category.html">Journey</a>
              </li>
              <li class="page-footer__nav-item">
                <a href="category.html">Inspiration</a>
              </li>
            </ul>
          </nav>
        </div> -->

        <?php dynamic_sidebar('footer-widget-2')?>

    <!--     <div class="col-sm-4  col-md-4">
          <h4>Recent Posts</h4>
          <div class="page-footer__recent-post">
            <div class="page-footer__recent-post-info">
              <div class="page-footer__recent-post-content">
                <a href="single-post.html">Cup Of Coffee On The Window Sill</a>
              </div>
              <div class="page-footer__recent-post-date">
                <span>January 25, 2017</span>
              </div>
            </div>
          </div>
          <div class="page-footer__recent-post">
            <div class="page-footer__recent-post-info">
              <div class="page-footer__recent-post-content">
                <a href="single-post.html">Flower Bedroom Ideas</a>
              </div>
              <div class="page-footer__recent-post-date">
                <span>January 24, 2017</span>
              </div>
            </div>
          </div>
        </div> -->
        <?php dynamic_sidebar('footer-widget-3')?>

      </div>
      <div class="container  page-footer__bottom">
        <div class="col-sm-8  col-md-8  page-footer__bottom-copyright">
          <p>2017 © Anri. Personal Blog Template by Feelman.</p>
        </div>
        <div class="col-sm-4  col-md-4  page-footer__bottom-social">
          <a href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
            </svg>
          </a>
          <a href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
            </svg>
          </a>
          <a href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#google"></use>
            </svg>
          </a>
          <a href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pinterest"></use>
            </svg>
          </a>
          <a href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
            </svg>
          </a>
        </div>
      </div>
    </footer>
    <div class="search-popup">
      <svg class="search-popup__close">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#btn-close"></use>
      </svg>
      <div class="container  search-popup__container">
        <form action="http://feelman.info/html/anri/index.html">
          <input type="text" size="32" placeholder="Search">
        </form>
      </div>
	</div>
    <div class="content-overlay"></div>
    <?php wp_footer(); ?>
  </body>

</html>
