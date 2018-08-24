    <?php $footer_text = carbon_get_theme_option( 'mm_footer_text' ); ?>

    <footer class="text-muted footer">
        <div class="container">
            <div class="row">
                <p>
                    <?php
                    if( !empty( $footer_text ) ) {
                        echo do_shortcode( $footer_text );
                    }
                    ?>
                </p>

                <p class="margin-left">
                    <a href="#">
                        <?php esc_html_e( 'Back To Top', 'mm' ); ?>
                    </a>
                </p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
