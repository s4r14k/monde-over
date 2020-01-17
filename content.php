<div class="col-sm-4 blog-post post-actualite">
  <h2 class="blog-post-title title-actualite"><?php the_title(); ?></h2>
  <?php if ( has_post_thumbnail() ) {?>
    <div class="actualite-single">
      <div class="image-actualite">
        <?php the_post_thumbnail('medium_large'); ?>
        <span class="bloc-image-overlay"></span>
      </div>
      <div class="content-actualite">
        <?php the_excerpt(); ?>
      </div>
    </div>
    <?php } else { ?>
    <?php the_excerpt(); ?>
  <?php } ?>
</div><!-- /.blog-post -->