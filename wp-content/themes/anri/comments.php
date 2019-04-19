<div class="single-post__comments">
<h5><?php comments_number(); ?></h5>
<ul class="single-post__comments-list">
<?php
	wp_list_comments(array(
		'walker' => new MY_Walker_Comment(),
	));

	?>
	</ul>
	<?php

	comment_form();
?>