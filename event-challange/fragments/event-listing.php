<div class="album text-muted">
    <div class="container">
        <div class="row">
            <?php if ( $events->have_posts() ): ?>
                <?php while( $events->have_posts() ): $events->the_post(); ?>
                    <div class="card">
                        <?php
                        the_title( '<h3 class="text-center">', '</h3>', true );

                        $event_id = get_the_id();
                        $event_date = carbon_get_post_meta( $event_id, 'mm_event_date' );
                        $event_date = date( 'F j, Y g:i A', strtotime( $event_date ) );
                        $event_calendar_date = date( 'Ymd\\THi00\\Z', strtotime( $event_date ) );
                        $event_url = carbon_get_post_meta( $event_id, 'mm_event_url' );
                        $location = carbon_get_post_meta( $event_id, 'mm_location' );
                        ?>

                        <div class="card-text">
                            <p class="date">
                                <?php echo $event_date; ?>
                            </p>

                            <div class="map-container">
                                <div id="map-<?php echo $event_id; ?>" data-lat="<?php echo esc_attr( $location[ 'lat' ] ); ?>" data-lng="<?php echo esc_attr( $location[ 'lng' ] ); ?>" data-info="<?php echo esc_attr( $location[ 'address' ] ); ?>"></div>
                            </div>

                            <a href="<?php echo esc_url( $event_url ); ?>" class="btn btn-primary" target="_blank">
                                <?php esc_html_e( 'Click To See The Event', 'mm' ); ?>
                            </a>

                            <a href="http://www.google.com/calendar/event?action=TEMPLATE&amp;text=<?php echo get_the_title(); ?>&amp;dates=<?php echo $event_calendar_date; ?>/<?php echo $event_calendar_date; ?>&amp;location=<?php echo $location[ 'address' ]; ?>&amp;trp=false&amp;sprop=&amp;sprop=name:" target="_blank" rel="nofollow" class="btn btn-secondary">
                                <?php esc_html_e( 'Add To Your Google Calendar', 'mm' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <div class="text-center" style="margin: 20px auto;">
                    <h2 class="text-center">
                        <?php esc_html_e( 'No Events Found!', 'mm' ); ?>
                    </h2>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
