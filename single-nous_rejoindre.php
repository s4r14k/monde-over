<?php
/*
 * Template Name: A propos offre
 * Template Post Type: post, page, product, nous_rejoindre
 */
?>

<?php get_header(); ?>
<div class="row">

  	<div class="backing-offre container"><span>Retour</span></div>
    <h1 class="blog-post-title container titre-postuler"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span><?php the_title(); ?></h1>
	  <div class="col-sm-12 blog-main">
	    <?php
		echo do_shortcode('[cf7form cf7key="nouvelle-offre"]');
	   ?>
	  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>