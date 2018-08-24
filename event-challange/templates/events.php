<?php
/*
Template Name: Events Template
*/
get_header();
the_post();

$today = date( 'Y-m-d' );
$events_args = array(
    'post_type' => 'mm_event',
    'posts_per_page' => -1,
    'meta_key'  => '_mm_event_date',
    'orderby'   => 'meta_value',
    'order' => 'asc',
    'meta_query' => array(
        array(
            'key' => '_mm_event_date',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        )
    )
);

$events = new WP_Query( $events_args );
?>
<div class="main">
    <section class="jumbotron">
        <div class="container">
            <?php the_title( '<h1 class="jumbotron-heading">', '</h1>', true ); ?>

            <p class="lead text-muted">
                <?php the_content(); ?>
            </p>
        </div>
    </section>

    <?php crb_render_fragment( 'event-listing', array( 'events' => $events ) ); ?>
</div>
<?php get_footer();
