<div class="card">
	<div class="post-item">
		<div class="post-img-holder">
			<img src="<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>" alt="" class="img-responsive">
			<div class="readmore-holder">
				<a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
			</div>
		</div>
		<div class="card-inner">
			<div class="top-info">
				<span><i class="fa fa-calendar"></i> <?php echo get_the_date( 'j M Y' ); ?></span> <span><i class="fa fa-comment"></i> <?php echo comments_number( 'No coments yet', 'Comment', 'Comments' ); ?></span>
			</div>
			<h5><?php echo get_the_title() ; ?></h5>
			<p><?php echo get_the_excerpt(); ?></p>
		</div>
	</div>
</div> <!-- finish -->