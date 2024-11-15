<?php
    $post_type = get_post_type();
    $pods = pods($post_type, get_the_ID());
    $photos = $pods->field('photo');
    if ( ! empty( $photos ) ) {
        echo '<div class="photo"><ul>';
        foreach ( $photos as $file ) {
            $file_url = $file['guid'];
            $file_name = $file['post_title'];
            echo "<li><figure><img src='{$file_url}' alt='{$file_name}' /><figcaption>{$file_name}</figcaption></figure></li>";
        }
        echo '</ul></div>';
    };

?>