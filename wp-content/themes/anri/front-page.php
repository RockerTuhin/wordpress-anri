<?php get_header(); ?>


	<main>
      <div class="container">
        <div class="col-md-8  col-lg-9">
         
         
          <?php while(have_posts()):the_post()?>
          <div class="blog-post">
            <div class="blog-post__image">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
            <div class="blog-post__title">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div class="blog-post__info">
              <span>By <a href="#"><?php the_author(); ?></a></span>
              <span><?php the_time('F d, Y'); ?></span>
              <span><a href="#"><?php comments_number(); ?></a></span>
            </div>
            <div class="blog-post__content">
              <p><?php echo wp_trim_words(get_the_content(),15); ?></p>
            </div>
            <div class="blog-post__footer">
              <a class="blog-post__footer-link" href="<?php the_permalink(); ?>">Read more</a>
              <div class="blog-post__footer-social">
                <span>Share:</span>
                <div class="blog-post__footer-social-icons">
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
          </div>
      <?php endwhile; ?>
        <?php $pagination = get_the_posts_pagination(array(
            'mid_size'           => 1,
            'prev_text'          => _x( 'Previous Page', 'previous set of posts' ),
            'next_text'          => _x( 'Next Page', 'next set of posts' ),
            'screen_reader_text' => __( 'Posts navigation' ),
          )); 

          $pagination = str_replace('navigation pagination', 'blog-pagination', $pagination);
          $pagination = str_replace('page-numbers', 'blog-pagination__items', $pagination);
          $pagination = str_replace('<li>', '<li class="blog-pagination__item">', $pagination);

          echo $pagination;
          ?>
          
        </div>

        <?php get_sidebar(); ?>

      </div>
    </main>


<?php get_footer(); ?>
