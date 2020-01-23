<?php
/*
 * Template Name: A propos actualite
 * Template Post Type: post, page, product
 */
?>

<div class="blog-post">
	<h2 class="blog-post-title"><?php the_title(); ?></h2>
	<div class="backing">Retour</div>
	<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
	<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	} ?>
	<?php the_content(); ?>
</div><!-- /.blog-post -->