<?php
    $args = array(
        'post_type' => array('properties_new', 'properties_used', 'properties_land', 'properties_condomini'),
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    
    $custom_query = new WP_Query( $args );
?>

    <?php if($custom_query->have_posts()): ?>
        <?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
            <?php
                get_template_part('template-parts/properties/property-head');
            ?>
    <?php endwhile; ?>
    <?php else: ?><p>No items</p>
    <?php endif; wp_reset_postdata(); ?>
