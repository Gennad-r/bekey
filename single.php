<?php

get_header();
?>
	<div class="container">
		<div class="row">


			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post(); 

					get_template_part( 'parts/single-content', get_post_format() );

			endwhile;
		endif;
		?>


		</div> <!-- row -->

	</div> <!-- container -->

<?php
get_footer();
