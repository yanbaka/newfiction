<?php
    $pods = pods('properties', get_the_ID());
    $recommended = $pods->field('recommended');
    if ( ! empty( $recommended ) ) {
        echo '<div class="recommended"><h3>おすすめポイント</h3><ul>';
        foreach ( $recommended as $value ) {
            echo "<li>{$value}</li>";
        }
        echo '</ul></div>';
    };

?>