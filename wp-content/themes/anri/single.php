<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anri
 */

get_header();
?>

	<main>
      <div class="container">
        <div class="col-md-8  col-lg-9">
        	<?php
        		while(have_posts()):the_post();
        	?>
          <div class="single-post">
            <div class="single-post__image">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="single-post__title">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="single-post__info">
              <span>By <a href="#"><?php the_author(); ?></a></span>
              <span><?php the_time('F d, Y') ?></span>
              <span><a href="#"><?php comments_number(); ?></a></span>
            </div>
            <div class="single-post__content">
              <?php the_content(); ?>
            </div>
            <div class="single-post__footer">
              <div class="single-post__footer-tags">
                <h3>Tags:</h3>
                <div class="single-post__footer-tags-list">
                  <?php the_tags('','',''); ?>
                </div>
                <h2>Post View: <?php post_view(get_the_id(),true); ?></h2>
              </div>
              <div class="single-post__footer-social">
                <span>Share:</span>
                <div class="single-post__footer-social-icons">
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
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#email"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="single-post__author">
              <div class="single-post__author-avatar">
                <!-- <img src="img/author.jpg" alt="Author"> -->
                <?php echo get_avatar('user_email'); ?>
              </div>
              <div class="single-post__author-info">
                <h5>Written by <?php the_author('user_nicename'); ?></h5>
                <p><?php echo get_the_author_meta('description'); ?></p>
                <div class="single-post__author-info-social">
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
            </div>
            <div class="single-post__nav">
              <?php 
                  $prev_post = get_previous_post();
                  $next_post = get_next_post();
              ?>
              <?php if (!empty( $prev_post )): ?>
              <a class="single-post__nav-previous" href="<?php echo $prev_post->guid;?>">
                <span class="single-post__nav-previous-link">PREVIOUS POST</span>
                <span><?php echo $prev_post->post_title;?></span>
              </a>
              <?php endif; ?>
              <?php if (!empty( $next_post )): ?>
              <a class="single-post__nav-next" href="<?php echo $next_post->guid;?>">
                <span class="single-post__nav-next-link">NEXT POST</span>
                <span><?php echo $next_post->post_title;?></span>
              </a>
              <?php endif; ?>
            </div>
            <?php endwhile;?>
            <div class="single-post__related">
              <?php
                  $terms = get_the_terms( get_the_ID(), 'category' );
                  $category_in = array();
                  foreach ($terms as $item) {
                      $category_in[] = $item->term_id;
                  }
              ?>
              <?php
                 $related_post = new WP_Query(array(
                      'post_type' => 'post',
                      'category__in' => $category_in,
                      'post__not_in' => array($post->ID),
                 ));
              ?>
              <?php 
                  while($related_post->have_posts()):$related_post->the_post();
              ?>
              <div class="single-post__related-item">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                  <h6><?php the_title(); ?></h6>
                </a>
                <span><?php the_time('F d, Y') ?></span>
              </div>
              <?php  endwhile;?>
            </div>
            <!--<div class="single-post__comments">
              <h5>3 Comments</h5>
              <ul class="single-post__comments-list">
                <li class="single-post__comments-item">
                  <div class="single-post__comments-item-body">
                    <div class="single-post__comments-item-avatar">
                      <img src="img/comment1.jpg" alt="Comment Author">
                    </div>
                    <div class="single-post__comments-item-right">
                      <div class="single-post__comments-item-reply">
                        <a href="#">Reply</a>
                      </div>
                      <div class="single-post__comments-item-info">
                        <div class="single-post__comments-item-info-author">
                          <span>
                            <a href="#">Matt Kian</a>
                          </span>
                        </div>
                        <div class="single-post__comments-item-info-date">
                          <span>
                            <a href="#">February 25, 2015 at 2:24 pm</a>
                          </span>
                        </div>
                      </div>
                      <div class="single-post__comments-item-post">
                        <p>Dignissim pharetra consequat condimentum scelerisque. Vestibulum sagittis scelerisque montes enim Cursus dui lectus cras mattis Laoreet aliquam varius ut adipiscing interdum lacus risus mattis urna semper cras hendrerit, morbi nonummy.</p>
                      </div>
                    </div>
                  </div>
                  <ul class="single-post__comments-children">
                    <li class="single-post__comments-item">
                      <div class="single-post__comments-item-body">
                        <div class="single-post__comments-item-avatar">
                          <img src="img/comment2.jpg" alt="Comment Author">
                        </div>
                        <div class="single-post__comments-item-right">
                          <div class="single-post__comments-item-reply">
                            <a href="#">Reply</a>
                          </div>
                          <div class="single-post__comments-item-info">
                            <div class="single-post__comments-item-info-author">
                              <span>
                                <a href="#">Olyvia Becca</a>
                              </span>
                            </div>
                            <div class="single-post__comments-item-info-date">
                              <span>
                                <a href="#">March 11, 2015 at 5:35 pm</a>
                              </span>
                            </div>
                          </div>
                          <div class="single-post__comments-item-post">
                            <p>Aliquet arcu cubilia dignissim natoque posuere vestibulum malesuada integer Ridiculus suscipit justo In tempus penatibus diam arcu dictumst felis scelerisque nunc blandit cubilia condimentum class justo natoque volutpat nam.</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="single-post__comments-item">
                  <div class="single-post__comments-item-body">
                    <div class="single-post__comments-item-avatar">
                      <img src="img/comment3.jpg" alt="Comment Author">
                    </div>
                    <div class="single-post__comments-item-right">
                      <div class="single-post__comments-item-reply">
                        <a href="#">Reply</a>
                      </div>
                      <div class="single-post__comments-item-info">
                        <div class="single-post__comments-item-info-author">
                          <span>
                            <a href="#">Jess Lavone</a>
                          </span>
                        </div>
                        <div class="single-post__comments-item-info-date">
                          <span>
                            <a href="#">April, 2016 at 9:48 pm</a>
                          </span>
                        </div>
                      </div>
                      <div class="single-post__comments-item-post">
                        <p>Dapibus ullamcorper ullamcorper class potenti sed, rhoncus arcu. Ligula iaculis aliquet, interdum luctus porttitor lacinia eu etiam. Pede elementum nisl dui facilisis at, metus facilisi, class consectetuer. Feugiat malesuada dis.</p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <div class="single-post__comments-respond">
                <h5>Leave a Comment</h5>
                <form action="http://feelman.info/html/anri/single-post.html" method="post">
                  <p class="single-post__comments-respond-comment">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" cols="45" aria-required="true"></textarea>
                  </p>
                  <p class="single-post__comments-respond-author">
                    <label for="author">Name*</label>
                    <input id="author" type="text" name="author" size="30" aria-required="true" required>
                  </p>
                  <p class="single-post__comments-respond-email">
                    <label for="email-form">Email*</label>
                    <input id="email-form" type="email" name="email-form" size="30" aria-required="true" required>
                  </p>
                  <p class="single-post__comments-respond-url">
                    <label for="url">Website</label>
                    <input id="url" type="text" name="url" size="30" aria-required="true">
                  </p>
                  <p class="single-post__comments-respond-submit">
                    <input id="submit" type="submit" name="submit" size="30" value="Post Comment">
                  </p>
                </form>
              </div>-->
            </div>
            <?php while(have_posts()):the_post(); ?>
            <?php comments_template(); ?>
          </div>
         <?php endwhile;?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </main>
<?php
wp_mail('mitul.chakraborty.nstu@gmail.com','ata','ata ponda pukki mar');
get_footer();
