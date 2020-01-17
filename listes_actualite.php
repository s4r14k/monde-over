<?php /* Template Name: Listes actualite */ ?>
 
<?php get_header(); ?>
<div class="row">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span><?php the_title(); ?></h1>
  <div class="col-sm-12 blog-main">
    <?php 
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
     
    <?php if ( $wpb_all_query->have_posts() ) : ?>
     
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
        get_template_part( 'content', get_post_format() );
    endwhile; ?>
    <!-- end of the loop -->
 
    <?php wp_reset_postdata(); ?>
     
    <?php else : ?>
        <p><?php _e( 'Ouuppss, Plus d\'actualité pour le moment.' ); ?></p>
    <?php endif; ?>
  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>
