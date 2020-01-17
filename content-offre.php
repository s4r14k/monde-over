<?php $meta = get_post_meta( get_the_ID(), 'offres', true ); ?>
<div class="blog-post post-offre">
  <h2 class="blog-post-title title-offre"><?php the_title(); ?></h2>
    <div class="single-offre">
      <div class="content-offre">
        <div>
    		<span><i class="fa fa-folder" aria-hidden="true"></i> <?php if (is_array($meta) && isset($meta['type_contrat'])){ echo $meta['type_contrat']; } ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
    		<span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php if (is_array($meta) && isset($meta['lieux'])){ echo $meta['lieux']; } ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
        	<span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo 'Il y a '. human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
        	<span class="postuler-offre"><a href="<?php the_permalink(); ?>">Postuler</a></span>
    	</div>
      </div>
    </div>
</div><!-- /.blog-post -->