<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/* ==========================================================================
    #Home Page Settings
========================================================================== */

Container::make( 'post_meta', __( 'Home Page Settings', 'mm' ) )
    ->where( 'post_type', '=', 'mm_event' )

    ->add_tab( __( 'Events Settings', 'mm' ), array(
        Field::make( 'date_time', 'mm_event_date', __( 'Date', 'mm' ) )
            ->set_required( 1 )
            ->set_width( 50 ),
        Field::make( 'text', 'mm_event_url', __( 'URL for the Event', 'mm' ) )
            ->set_required( 1 )
            ->set_width( 50 ),
        Field::make( 'map', 'mm_location', __( 'Location', 'mm' ) )
            ->set_required( 1 ),
    ) );
