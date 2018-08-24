<?php
$cm_section_title = carbon_get_theme_option( 'mm_cm_section_title' );
$cm_section_content = carbon_get_theme_option( 'mm_cm_section_content' );
$cm_socials_section_title = carbon_get_theme_option( 'mm_cm_socials_section_title' );

if( empty( $cm_section_content ) ) {
    return;
}
?>
<div class="collapse bg-inverse" id="navbarHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 py-4">
                <?php if ( $cm_section_title ): ?>
                    <h4 class="text-white">
                        <?php echo esc_html( $cm_section_title ); ?>
                    </h4>
                <?php endif; ?>

                <p class="text-muted">
                    <?php echo do_shortcode( nl2br( $cm_section_content ) ); ?>
                </p>
            </div>

            <div class="col-sm-4 py-4">
                <?php if( !empty( $cm_socials_section_title ) ) : ?>
                    <h4 class="text-white">
                        <?php echo esc_html( $cm_socials_section_title ); ?>
                    </h4>
                <?php endif; ?>

                <?php get_template_part( 'fragments/socials' ); ?>
            </div>
        </div>
    </div>
</div>
