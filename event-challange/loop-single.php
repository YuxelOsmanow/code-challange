<?php the_post(); ?>
<div class="main">
	<div class="section">
		<div class="shell">
			<article class="article article--single">
				<div class="article__inner">
					<header class="article__head">
						<?php the_title( '<h2 class="article__title">', '</h2>' ); ?>
						<?php crb_render_fragment( 'post-meta' ); ?>
					</header><!-- /.article__head -->

					<div class="article__body">
						<div class="article__entry">
							<?php the_content(); ?>
						</div><!-- /.article__entry -->
					</div><!-- /.article__body -->
				</div><!-- /.article__inner -->
			</article><!-- /.article -->
		</div><!-- /.shell -->
	</div><!-- /.section -->
</div><!-- /.main -->
