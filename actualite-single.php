<?php 
/* 
* Template Name: detail actualite
* Template Post Type: post, page, product 
*/ 
?>
 
<?php get_header(); ?>
<div class="actualite-detail">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>&nbsp;&nbsp;<?php the_title(); ?></h1>
  <div class="actualite-detail-post">
       <?php the_content(); ?>
    </div>
  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>