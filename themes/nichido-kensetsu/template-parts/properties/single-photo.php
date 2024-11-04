<?php
    $pods = pods('properties', get_the_ID());
    $photos = $pods->field('photo');
    if ( ! empty( $photos ) ) {
        echo '<div class="photo"><ul>';
        foreach ( $photos as $file ) {
            $file_url = $file['guid'];
            $file_name = $file['post_title'];
            echo "<li><img src='{$file_url}' alt='{$file_name}' /></li>";
        }
        echo '</ul></div>';
    };

?>