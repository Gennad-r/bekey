<div class="col-lg-3 col-md-4 post-item">
	<div class="card mb-4">
		<a href="<?php the_permalink(); ?>">
			<img class="card-img-top img-responsive" src="<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php echo get_the_title() ; ?></h5>
				<p class="card-text"><?php echo get_the_excerpt(); ?></p>
			</div>
		</a>
	</div>
</div>
