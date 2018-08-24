<?php
get_header();
the_post();
?>
<div class="main">
	<div class="shell">
		<div class="content">
			<div <?php post_class( 'page' ); ?>>
				<?php mm_the_title( '<h2 class="page__title pagetitle">', '</h2>' ); ?>
				
				<div class="page__entry">
					<?php
					the_content();

					edit_post_link( __( 'Edit this entry.', 'mm' ), '<p>', '</p>' );
					?>
				</div><!-- /.page__entry -->
			</div><!-- /.page -->
		</div><!-- /.content -->
	</div><!-- /.shell -->
</div><!-- /.main -->
<?php get_footer();
