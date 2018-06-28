<?php

get_header();
?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card-columns mt-4">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); 
						get_template_part( 'parts/content', get_post_format() );
					endwhile;
				endif;
				?>
				</div>
			</div>
		</div> <!-- row -->
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<div class="row">
				<div class="col-12 text-center mb-5">
					<button id="load-more" type="button" class="btn btn-dark">Load more...</button>
				</div>
			</div>
		<?php endif ?>
	</div> <!-- container -->
<?php
get_footer();
