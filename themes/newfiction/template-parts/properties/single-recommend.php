<?php
    $post_type = get_post_type();
    $pods = pods($post_type, get_the_ID());
    $recommended = $pods->field('recommended');
    if ( ! empty( $recommended ) ) {
        echo '<div class="recommended"><h3>おすすめポイント</h3><ul>';
        foreach ( $recommended as $value ) {
            echo "<li>{$value}</li>";
        }
        echo '</ul></div>';
    };

?>