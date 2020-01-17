<?php 
/*
    Template Name: Listes offres
    Template Post Type: post, page, product, nous_rejoindre
*/
?>
 
<?php get_header(); ?>
<div class="row">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>Nos offres en cours</h1>
  <div class="col-sm-12 blog-main">
    <?php 
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'nous_rejoindre', 'post_status'=>'publish', 'posts_per_page'=>3)); ?>
     
    <?php if ( $wpb_all_query->have_posts() ) : ?>
     
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
        get_template_part( 'content-offre', get_post_format() );
    endwhile; ?>
    <!-- end of the loop -->
 
    <?php wp_reset_postdata(); ?>

    <div class="candidature-spontannee post-offre">
        <div class="h2"><span>Tu ne trouves pas ton <span class="accent-text">bonheur?</span></span></div>
        <div class="candidature-spontannee-p"><p>Pas de panique, nous sommes continuellement à la recherche de nouveaux talents qui partagent 
nos valeurs !</p></div>
        <div><a class="postuler-offre-spontanee" href="">candidature spontanée</a></div>
    </div>
     
    <?php else : ?>
        <p><?php _e( 'Ouuppss, Plus d\'actualité pour le moment.' ); ?></p>
    <?php endif; ?>
  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>
