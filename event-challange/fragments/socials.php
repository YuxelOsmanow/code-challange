<?php
$socials = mm_socials_array();

if ( empty( $socials ) ) {
	return;
}
?>
<div class="socials">
	<ul class="list-unstyled">
		<?php foreach ( $socials as $key => $social ) : ?>
			<?php
			$socials_link = carbon_get_theme_option( 'mm_link_' . $key );
			$target = 'target="_blank"';
            $link = $socials_link;

            if ( $key == 'email' ) {
                $target = '';
                $link = 'mailto:' . $socials_link;
			}
			?>

			<?php if ( !empty( $socials_link ) ) : ?>
				<li>
					<a href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $target ); ?> class="text-white">
                        <?php echo esc_html( $social ); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
