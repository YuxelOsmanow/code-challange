<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

$socials = mm_socials_array();

foreach ( $socials as $key => $social ) {
    $field_title = __( '%s Link', 'mm' );

    if ( $key == 'email' ) {
        $field_title = __( '%s', 'mm' );
    }

    $fields[ ] = Field::make( 'text', 'mm_link_' . $key, sprintf( $field_title, $social ) );
}

Container::make( 'theme_options', __( 'Theme Options', 'mm' ) )
	->set_page_file( 'crbn-theme-options.php' )

    /* ==========================================================================
        #Header
    ========================================================================== */

    ->add_tab( __( 'Header', 'mm' ), array(
        Field::make( 'text', 'mm_logo_text', __( 'Header Logo Text', 'mm' ) ),
        Field::make( 'separator', 'mm_separator', __( 'Header Collapsed Menu', 'mm' ) ),
        Field::make( 'text', 'mm_cm_section_title', __( 'Section Title', 'mm' ) )
            ->set_width( 50 ),
        Field::make( 'textarea', 'mm_cm_section_content', __( 'Section Content', 'mm' ) )
            ->set_width( 50 ),
        Field::make( 'text', 'mm_cm_socials_section_title', __( 'Social Section Title', 'mm' ) ),
    ) )

    /* ==========================================================================
        #socials
    ========================================================================== */

    ->add_tab( __( 'Social Settings', 'mm' ), $fields )

    /* ==========================================================================
        #Footer
    ========================================================================== */

    ->add_tab( __( 'Footer', 'mm' ), array(
        Field::make( 'text', 'mm_footer_text', __( 'Footer Text', 'mm' ) )
            ->help_text( __( 'To Display the Current Year, Please Use the [year] shortcode.' ) ),
    ) )

	/* ==========================================================================
		#scripts
	========================================================================== */

	->add_tab( __( 'Scripts', 'mm' ), array(
        Field::make( 'text', 'mm_google_maps_api_key', __( 'Google Map API Key', 'mm' ) ),
		Field::make( 'header_scripts', 'mm_header_script', __( 'Header Script', 'mm' ) ),
		Field::make( 'footer_scripts', 'mm_footer_script', __( 'Footer Script', 'mm' ) ),
	) );
