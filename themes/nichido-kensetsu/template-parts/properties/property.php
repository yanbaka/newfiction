<?php
    $args = array(
        'post_type' => 'properties',
        'posts_per_page' => -1,
    );
    
    $custom_query = new WP_Query( $args );
?>

    <?php if($wp_query->have_posts()): ?>
        <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
            <?php
                get_template_part('template-parts/properties/property-head');
            ?>
    <?php endwhile; ?>
    <?php else: ?><p>No items</p>
    <?php endif; wp_reset_postdata(); ?>
