<?php 
/* 
* Template Name: actualite
* Template Post Type: post, page, product 
*/ 
?>
 
<?php get_header(); ?>
<div class="row">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>&nbsp;&nbsp;<?php the_title(); ?></h1>
  <div class="col-sm-12 blog-main">
    <?php 
    // the query
    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3)); ?>
     
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
    <div class="plus-actualite">
        <?php $listes_actualite = get_page_by_title('Listes actualites'); ?>
        <div class="plus-actualite-text"><a href="<?php echo get_page_link($listes_actualite->ID); ?>"><span>Plus d'actualité</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
    </div>
  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>
