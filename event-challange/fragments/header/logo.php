<?php
$logo_text = get_bloginfo( 'name' );
$user_logo_text = carbon_get_theme_option( 'mm_logo_text' );
$cm_section_content = carbon_get_theme_option( 'mm_cm_section_content' );

if( !empty( $user_logo_text ) ) {
    $logo_text = $user_logo_text;
}
?>
<div class="navbar navbar-inverse bg-inverse">
    <div class="container d-flex justify-content-between">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="navbar-brand">
            <?php echo esc_html( $logo_text ); ?>
        </a>

        <?php if( !empty( $cm_section_content ) ) : ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <?php endif; ?>
    </div>
</div>
