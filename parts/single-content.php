<div class="col-md-4">
	<img class="img-responsive" src="<?php the_post_thumbnail_url( 'post-thumbnails' ); ?>" alt="Card image cap">
</div>
<div class="col-md-8">
	<h2 class="card-title"><?php echo get_the_title() ; ?></h2>
	<p><?php echo get_the_content(); ?></p>
</div>