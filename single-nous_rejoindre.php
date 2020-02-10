<?php
/*
 * Template Name: A propos offre
 * Template Post Type: post, page, product, nous_rejoindre
 */
?>

<?php get_header(); ?>
<div class="row">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span><?php the_title(); ?></h1>
	  <div class="body-offre">
	    <?php
		$meta = get_post_meta( get_the_ID(), 'offres', true );
		$postuler = get_page_by_title('Postuler');
	   ?>
	   <div class="mission">
	   	<div class="col-sm-6"><div class="titre"><span class="titre-mission">TES MISSIONS</span></div><p class="text-offre"><?php if (is_array($meta) && isset($meta['mission'])){ echo $meta['mission']; } ?></p></div>
	   	<div class="col-sm-6"><img class="img-offre" src="<?php if (is_array($meta) && isset($meta['image1'])){ echo $meta['image1']; } ?>"></div>
	   </div>

	   <div class="profil">
	   	<div class="col-sm-6"><img class="img-offre" src="<?php if (is_array($meta) && isset($meta['image2'])){ echo $meta['image2']; } ?>"></div>
	   	<div class="col-sm-6"><div class="titre"><span class="titre-mission">TON PROFIL</span></div><p class="text-offre"><?php if (is_array($meta) && isset($meta['profil'])){ echo $meta['profil']; } ?></p></div>
	   </div>

	   <div id="postuler">
	   	<span id="postuler-text"><a href="<?php echo get_page_link($postuler->ID).'?offre_id='.get_the_ID(); ?>">Postuler</a></span>
	   </div>

	   <div id="nous-rejoindre">
	   	<div class="col-sm-6 collab"><img class="img-collab" src="/hellotana/wp-content/uploads/2020/01/screen_2x-13.jpg"></div>
	   	<div class="col-sm-6 collab align-collab"><p class="text-collab">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p></div>
		</div>
	  </div>
</div>

</div><!-- /.container -->
<?php get_footer(); ?>