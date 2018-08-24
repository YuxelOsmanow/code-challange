<form action="<?php echo home_url( '/' ); ?>" class="search-form" method="get" role="search">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'mm' ); ?></span>

		<input type="text" title="<?php _e( 'Search for:', 'mm' ); ?>" name="s" value="" id="s" placeholder="<?php _e( 'Search &hellip;', 'mm' ); ?>" class="search-field" />
	</label>

	<input type="submit" value="<?php echo esc_attr( __( 'Search', 'mm' ) ); ?>" class="search-submit screen-reader-text" />
</form>