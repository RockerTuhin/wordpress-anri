<?php
	class MY_Walker_Comment extends Walker_Comment {
			protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="single-post__comments-item-body">

				<div class="single-post__comments-item-avatar">
                      <?php 
                      	$args['avatar_size'] = 512;
                      	if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] );
                      ?>
                </div>
                <div class="single-post__comments-item-right">
                      <div class="single-post__comments-item-reply">
                        <?php
							comment_reply_link( array_merge( $args, array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<div class="reply">',
								'after'     => '</div>'
							) ) );
						?>
                      </div>
                      <div class="single-post__comments-item-info">
                        <div class="single-post__comments-item-info-author">
                          <span>
                            <?php
								/* translators: %s: comment author link */
								printf( __( '%s <span class="says">says:</span>' ),
									sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
								);
							?>
                          </span>
                        </div>
                        <div class="single-post__comments-item-info-date">
                          <span>
                        	<?php
								/* translators: 1: comment date, 2: comment time */
								printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
							?>
                          </span>
                        </div>
                      </div>
                      <div class="single-post__comments-item-post">
                        <p><?php comment_text(); ?></p>
                      </div>
                </div>

			</article><!-- .comment-body -->
<?php
			}
			public function start_lvl( &$output, $depth = 0, $args = array() ) {
				$GLOBALS['comment_depth'] = $depth + 1;

				switch ( $args['style'] ) {
					case 'div':
						break;
					case 'ol':
						$output .= '<ol class="single-post__comments-children">' . "\n";
						break;
					case 'ul':
					default:
						$output .= '<ul class="single-post__comments-children">' . "\n";
						break;
				}
			}
	}
?>