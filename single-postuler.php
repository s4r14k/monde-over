<?php
/*
 * Template Name: Postuler
 * Template Post Type: post, page
 */
?>

<?php get_header(); ?>
<div class="row">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span><?php echo get_the_title($_GET['offre_id'])  ?></h1>
	  <div class="col-sm-12 blog-main">
	    <?php
		echo do_shortcode('[cf7form cf7key="nouvelle-offre"]');
	   ?>
	  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>