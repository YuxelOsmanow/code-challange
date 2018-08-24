<?php if ( have_posts() ) : ?>	
	<?php while( have_posts() ) : the_post(); ?>
		<div class="article">
			<?php if ( has_post_thumbnail() ): ?>
				<div class="article-image">
					<?php the_post_thumbnail(); ?>
				</div><!-- /.article-image -->
			<?php endif; ?>

			<div class="entry">
				<h3>
					<?php the_title(); ?>
				</h3>

				<?php the_content(); ?>
			</div><!-- /.entry -->
		</div><!-- /.article -->
	<?php endwhile; ?>
	<?php carbon_pagination( 'posts' ); ?>
<?php else : ?>
	<div class="article error404">
		<div class="entry">
			<p>
				<?php
				if ( is_category() ) { // If this is a category archive
					printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'mm' ), single_cat_title( '', false ) );
				} else if ( is_date() ) { // If this is a date archive
					_e( "Sorry, but there aren't any posts with this date.", 'mm' );
				} else if ( is_author() ) { // If this is a category archive
					$userdata = get_user_by( 'id', get_queried_object_id() );
					printf( __( "Sorry, but there aren't any posts by %s yet.", 'mm' ), $userdata->display_name );
				} else if ( is_search() ) { // If this is a search
					_e( 'No posts found. Try a different search?', 'mm' );
				} else {
					printf( __( 'Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.', 'mm' ), home_url( '/' ) );
				}
				?>
			</p>

			<?php get_search_form(); ?>
		</div><!-- /.article -->
	</div><!-- /.article -->
<?php endif;
