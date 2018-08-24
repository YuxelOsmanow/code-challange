<?php
get_header();

crb_render_fragment( 'event-listing', array( 'events' => $events ) );

get_footer();
