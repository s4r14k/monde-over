<?php 
/* 
* Template Name: detail actualite
* Template Post Type: post, page, product 
*/ 
?>
 
<?php get_header(); ?>
<div class="actualite-detail">
    <h1 class="blog-post-title title-h1-actualite"><span><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i></span>&nbsp;&nbsp;<?php the_title(); ?></h1>
    <div class="post-link row">
        <div class="previous-post col-sm-6"><?php previous_post_link('%link', '<i class="fa fa-chevron-left left-post" style="font-size: 3rem;"></i>', TRUE); ?></div>
        <div class="next-post col-sm-6"><?php next_post_link('%link', '<i class="fa fa-chevron-right right-post" style="font-size: 3rem;"></i>', TRUE); ?></div>
    </div>
  <div class="actualite-detail-post">
       <?php the_content(); ?>
    </div>
  </div><!-- /.blog-main -->
</div><!-- /.row -->

</div><!-- /.container -->
<?php get_footer(); ?>